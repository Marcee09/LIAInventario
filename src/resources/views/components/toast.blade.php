<div id="toast-{{ $name }}" toast="{{ $name }}" style="display: none">
    {{ $slot }}
</div>

<script>
    var toast = document.getElementById('toast-{{ $name }}');
    toast.style.display = 'none';
    document.addEventListener('toast', (event) => {
        var toast_name = event.detail.toast_name;
        var toast_duration = event.detail.duration;
        var toast_message = event.detail.message;
        var toast_element = document.getElementById('toast-' + toast_name);
        if (!toast_element) {
            return;
        }
        //var toast_render = toast_element.querySelector('.toast-render');
        var toast_render = document.getElementById('toast-' + toast_name + '-event-render');
        if (toast_render) {
            toast_render.innerHTML = toast_message;
        }
        toast_element.style.display = 'block';
        setTimeout(() => {
            toast_element.style.display = 'none';
        }, toast_duration);
    });
</script>
