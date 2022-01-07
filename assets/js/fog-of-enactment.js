


/**
 * Accept an element containing an anchor link, and override the
 * default jumping behaviour to use the browser's scrollIntoView
 * feature
 *
 * @param  elem - a DOM element, typically in a list from querySelector
 */
function addScrollBehaviourToLink(elem) {
  //
  elem.addEventListener('click', function (event) {

    // abort early if we have no hash to link to
    if (!(elem.hash)) {
      return
    }

    console.log(elem)
    window.elem = elem

    // does this heading have further items to disclose?
    if (elem.tagName == "A" && elem.parentNode.tagName == "SUMMARY") {

      // we have a link, check if we're in a details element
      const detailsElem = elem.parentNode.parentNode

      // toggle the open/closed state
      detailsElem.open = !detailsElem.open


    }
    // cancel the default behaviour to avoid the confusing jump to the page
    event.stopPropagation();
    event.preventDefault();

    // then scroll into view
    if (elem.hash) {
      document.querySelector(elem.hash).scrollIntoView({ behavior: "smooth" })
    }
  })
}

/**
 * Debugging function List all the headings in a report post, so we can sanity
 * check we have the necessary headings listed.
 */
function listAllHeadingsWithIds() {
  const linkedHeadings = document.querySelectorAll('article h2, article h3')

  console.log("Listing h2 and h3  for nav headings")

  for (const heading of linkedHeadings) {
    console.log(heading)
  }

}
/**
 * Debugging function - lists all the links in the generate ToC, to see if
 * they match headings in the DOM.
 *
 */
function listTocLinks() {
  const tocLinks = document.querySelectorAll('nav .toc a')

  for (const link of tocLinks) {
    console.log(link)
    console.log(link.hash)
    addScrollBehaviourToLink(link)
  }
}


console.log("LOADED")

