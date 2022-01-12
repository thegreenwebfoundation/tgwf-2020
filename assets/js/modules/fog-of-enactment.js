
/**
 * Accept an element, and if it's a link inside summary element,
 * open the parent details element to show extra content
 * @param  {HTMLElement} elem
 */
function toggleDetailsIfSummary(elem) {
  if (elem.tagName == "A" && elem.parentNode.tagName == "SUMMARY") {

    // we have a link, check if we're in a details element
    const detailsElem = elem.parentNode.parentNode

    // toggle the open/closed state
    detailsElem.open = !detailsElem.open
  }
}


/**
 * Accept an element containing an anchor link, and override the
 * default jumping behaviour to use the browser's scrollIntoView
 * feature
 *
 * @param  {HTMLElement} elem - a DOM element, typically in a list from querySelector
 */
function addScrollBehaviourToLink(elem) {
  //
  elem.addEventListener('click', function (event) {

    // abort early if we have no hash to link to
    if (!(elem.hash)) {
      return
    }

    // cancel the default behaviour to avoid the confusing jump to the page
    event.stopPropagation();
    event.preventDefault();

    // does this heading have further items to disclose?
    // Trigger open / close if necessary
    toggleDetailsIfSummary(elem)

    // then scroll into view
    if (elem.hash) {
      document.querySelector(elem.hash).scrollIntoView(
        {
          behavior: "smooth",
          block: "center"
        }
      )
      // finally update the location bar with the correct url fragment.
      // this allows us to come back to it in history or share
      // links to a given section
      history.pushState({}, "", elem.hash)
    }
  })
}

/**
 * Debugging function: list all the headings in a report post, so we can sanity
 * check we have the necessary headings listed.
 */
function listAllHeadingsWithIds() {
  const linkedHeadings = document.querySelectorAll('article h2, article h3')

  console.log("Listing h2 and h3 for nav headings")

  for (const heading of linkedHeadings) {
    console.log(heading)
  }
}
/**
 *
 * Enrich our table of contents with nicer scrolling behaviour
 *
 */
function addScrollingToToC() {
  const tocLinks = document.querySelectorAll('nav .toc a')

  for (const link of tocLinks) {
    addScrollBehaviourToLink(link)
  }
}
/**
 * Add the floating mobile table of contents to make navigation through a large
 * page easier on devices with small screens
 */
function addToggleMobileToC() {
  const tocToggleBtn = document.querySelector('button.tocToggle')
  const toc = document.querySelector('nav .toc')
  const tocCloseBtn = document.querySelector('.toc button')
  const siteNavMenu = document.querySelector('.report-site-nav-menu .nav-menu-primary')
  const siteNavBtn = document.querySelector('.report-site-nav-menu button')

  tocToggleBtn.addEventListener("click", function (event) {
    toc.classList.toggle("visible");
  })

  tocCloseBtn.addEventListener("click", function (event) {
    toc.classList.remove("visible");
  })

  siteNavBtn.addEventListener("click", function (event) {
    siteNavMenu.classList.toggle("visible");
    siteNavMenu.classList.toggle("visually-hidden");
  })
}

/**
 * Accept a link pointing to footnote text in a document, then
 * create a easier-to-read sidenote
 *
 * @param  {HTMLElement} footnote
 */
function addSideNote(footnote) {
  const reference = footnote.hash
  // copy the element, so we can remove the unneeded return link
  const clonedReference = document.querySelector(reference).cloneNode(true)
  clonedReference.querySelector("a[rev='footnote']").remove()
  const referenceText = clonedReference.innerHTML
  const sideNoteText = '<span class="sidenote">' + footnote.innerText + '. ' + referenceText + '</span>'
  footnote.insertAdjacentHTML('afterend', sideNoteText)
}

/**
 * Find all the footnotes in the text and add the
 * easier-to-read sidenotes on the page.
 *
 */
function addSideNotes() {
  const footnotes = document.querySelectorAll("a[rel='footnote']")
  for (const footnote of footnotes) {
    addSideNote(footnote)
  }
}

window.addEventListener('DOMContentLoaded', function (event) {
  addScrollingToToC()
  addToggleMobileToC()
  // introduce some delay to allow the footnotes to load
  setTimeout(() => {
    addSideNotes()
  }, 250);

});
