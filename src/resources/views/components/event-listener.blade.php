<div x-data="eventListener()" x-init="startPolling()">
    <script>
        function eventListener() {
            return {
                async fetchEvents(reloaded = 0) {
                    try {
                        let response = await fetch('{{ route('pull-events') }}' + '?reloaded=' + reloaded);
                        if (response.ok) {
                            let event_data = await response.json();
                            if (event_data.length > 0) {
                                for (let event of event_data) {
                                    displayLogEvent(event);
                                    document.dispatchEvent(new CustomEvent(event.name, {
                                        detail: event.data
                                    }));
                                }
                            }
                        }
                    } catch (error) {
                        console.error('Error fetching events:', error);
                    }
                },

                startPolling() {
                    this.fetchEvents(1);
                    setInterval(() => {
                        this.fetchEvents();
                    }, 1000);
                }
            }
        }

        function displayLogEvent(event) {
            if (event.name === 'log') {
                console.log(event.data);
            }
        }
    </script>
</div>
