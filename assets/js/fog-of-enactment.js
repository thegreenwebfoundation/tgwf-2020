
/**
 * Accept an element, and if it's a link inside suumary element,
 * open the parent details element to show extra content
 * @param  {HTMLElement} elem
 */
function openDetailsIfSummary(elem) {
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
    openDetailsIfSummary(elem)

    // then scroll into view
    if (elem.hash) {
      document.querySelector(elem.hash).scrollIntoView(
        {
          behavior: "smooth",
          block: "center"
        }
      )
      // finally update the location bar with the correct url fragment
      // this allows us to come back to it in history or share
      // links to a given section
      history.pushState({}, "", elem.hash)
    }
  })
}

/**
 * Debugging function List all the headings in a report post, so we can sanity
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
 * Enrich our table of content with nicer scrolling behaviour
 *
 */
function addScrollingToToC() {
  const tocLinks = document.querySelectorAll('nav .toc a')

  for (const link of tocLinks) {
    addScrollBehaviourToLink(link)
  }
}

function addToggleMobileToC() {
  const tocToggleBtn = document.querySelector('button.tocToggle')
  const toc = document.querySelector('nav .toc')
  const tocCloseBtn = document.querySelector('.toc button')

  tocToggleBtn.addEventListener("click", function (event) {
    toc.classList.toggle("visible");
  })

  tocCloseBtn.addEventListener("click", function (event) {
    toc.classList.remove("visible");
  })



}


window.addEventListener('DOMContentLoaded', function (event) {
  addScrollingToToC()
  addToggleMobileToC()
});

