<div id="switcher" class="">
    <div class="content-switcher">
        <h4>STYLE SWITCHER</h4>
        <ul>
            <li>
                <a href="#" onclick="switchColor('purple');" title="purple" class="color"><img
                        src="{{ asset('frontend/img/styleswitcher/purple.png') }}" alt="purple" /></a>
            </li>
            <li>
                <a href="#" onclick="switchColor('red');" title="red" class="color"><img
                        src="{{ asset('frontend/img/styleswitcher/red.png') }}" alt="red" /></a>
            </li>
            <li>
                <a href="#" onclick="switchColor('blueviolet');" title="blueviolet" class="color"><img
                        src="{{ asset('frontend/img/styleswitcher/blueviolet.png') }}" alt="blueviolet" /></a>
            </li>
            <li>
                <a href="#" onclick="switchColor('blue');" title="blue" class="color"><img
                        src="{{ asset('frontend/img/styleswitcher/blue.png') }}" alt="blue" /></a>
            </li>
            <li>
                <a href="#" onclick="switchColor('goldenrod');" title="goldenrod" class="color"><img
                        src="{{ asset('frontend/img/styleswitcher/goldenrod.png') }}" alt="goldenrod" /></a>
            </li>
            <li>
                <a href="#" onclick="switchColor('magenta');" title="magenta" class="color"><img
                        src="{{ asset('frontend/img/styleswitcher/magenta.png') }}" alt="magenta" /></a>
            </li>
            <li>
                <a href="#" onclick="switchColor('yellowgreen');" title="yellowgreen" class="color"><img
                        src="{{ asset('frontend/img/styleswitcher/yellowgreen.png') }}" alt="yellowgreen" /></a>
            </li>
            <li>
                <a href="#" onclick="switchColor('orange');" title="orange" class="color"><img
                        src="{{ asset('frontend/img/styleswitcher/orange.png') }}" alt="orange" /></a>
            </li>
            <li>
                <a href="#" onclick="switchColor('green');" title="green" class="color"><img
                        src="{{ asset('frontend/img/styleswitcher/green.png') }}" alt="green" /></a>
            </li>
            <li>
                <a href="#" onclick="switchColor('yellow');" title="yellow" class="color"><img
                        src="{{ asset('frontend/img/styleswitcher/yellow.png') }}" alt="yellow" /></a>
            </li>
        </ul>
        <div id="hideSwitcher">&times;</div>
    </div>
</div>
<div id="showSwitcher" class="styleSecondColor"><i class="fa fa-cog fa-spin"></i></div>

<style>
    /* SweetAlert 3D Error Styling */
    .custom-popup {
        background: linear-gradient(145deg, #d8f0d0, #e0ffe0) !important;
        /* box-shadow: 2px 2px 5px #639f63, -1px -1px 2px #b56a6a !important; */
        color: #22a224 !important;
        border-radius: 15px !important;
    }

    .custom-title {
        color: #1fdc11;
        text-shadow: 1px 1px 3px #377137;
    }
</style>
<script>
    function switchColor(color) {
        $.ajax({
            url: "{{ route('switchStyle') }}", // URL of your controller route
            type: "POST",
            data: {
                color: color,
                _token: "{{ csrf_token() }}" // Include the CSRF token for security
            },
            success: function(response) {
                if (response.status == '200') {
                    // Handle success response, e.g., apply the new style dynamically
                    setActiveStyleSheet(color);

                    // Display SweetAlert for success
                    Swal.fire({
                        position: 'top-end',
                        icon: response.cls,
                        title: response.msg,
                        toast: true,
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 10000,
                        showCloseButton: true,
                        customClass: {
                            popup: 'custom-popup', // Class applied to the entire popup
                            title: 'custom-title', // Class applied to the title
                        }
                    });
                }
            }
        });
    }
</script>
