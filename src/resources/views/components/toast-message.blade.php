<div id="{{ $uid }}"></div>

<script>
    var element = document.getElementById("{{ $uid }}");
    var newId = findParentToastName(element);
    if (newId) {
        element.id = newId;
    } else {
        element.innerHTML = "x-toast-message error: parent toast component not found";
        element.style.color = 'red';
    }
    function findParentToastName(element) {
        if (!element) {
            return null;
        }
        if (element.hasAttribute("toast")) {
            return 'toast-' + element.getAttribute("toast") + '-event-render';
        }
        return findParentToastName(element.parentElement);
    }
</script>
