var count = 1;

function addInput(Element) {
    var parent = Element.parentElement;
    var inputparent = parent.children[1];
    var id = inputparent.getAttribute("id");
    var name = inputparent.getAttribute("name");
    name = name.replace(/\[.+\]/, '[' + count + ']');
    let newinp = document.createElement('input');
    newinp.className = inputparent.getAttribute("class");
    newinp.id = inputparent.getAttribute("id") + count;
    newinp.setAttribute('name', name);
    newinp.setAttribute('type', 'text');
    newinp.setAttribute('placeholder', inputparent.getAttribute('placeholder'));
    Element.before(newinp);
    count++;
}