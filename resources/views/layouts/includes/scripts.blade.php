<script>
    var asset_url = "{!! asset('assets/') !!}";
    var base_url = "{{ url('/') }}";
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="{{asset('assets/js/shared/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>--}}
<script src="{{ asset('assets/js/shared/intlTelInput.js') }}"></script>
<script type="text/javascript">
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(window).on('load', function () {
        // PAGE IS FULLY LOADED
        // FADE OUT YOUR OVERLAYING DIV
        $('#loader-wrapper').fadeOut();
        $('#mainBody').removeClass("d-none");
    });

    $(document).ready(function() {
        var menuFlag = false;
        $("#btn-hamburger").click(function() {
            menuFlag = !menuFlag;
            if (menuFlag) {
                $("#navbarSupportedContent").fadeIn(500);
                $(".menu-close-state").removeClass("mobile-nav").hide();
                $(".menu-open-state").css({display: 'flex'});
                $("<span class='navbar-logo-icon'></span>").insertAfter(".navbar-toggler");
            } else {
                $("#navbarSupportedContent").hide();
                $(".menu-close-state").addClass("mobile-nav");
                $(".menu-open-state").hide();
                $(".navbar-logo-icon").remove();
            };
        })
        $(".accordion-btn").click(function() {
            if ($(this).hasClass("opened")) {
                $(".accordion-btn").removeClass("opened");
            } else {
                $(".accordion-btn").removeClass("opened");
                $(this).addClass("opened");
            }
        })
        $(window).resize(function() {
            var windowHeight = $(window).height(); // New height
            var windowWidth = $(window).width(); // New width
            if (windowWidth > 992) {
                if (menuFlag) {
                    $("#btn-hamburger").click();
                }
            }
        });
    })
    document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element){

            element.addEventListener('click', function (e) {

                let nextEl = element.nextElementSibling;
                let parentEl  = element.parentElement;

                if(nextEl) {
                    e.preventDefault();
                    let mycollapse = new bootstrap.Collapse(nextEl);

                    if(nextEl.classList.contains('show')){
                        mycollapse.hide();
                    } else {
                        mycollapse.show();
                        // find other submenus with class=show
                        var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                        // if it exists, then close all of them
                        if(opened_submenu){
                            new bootstrap.Collapse(opened_submenu);
                        }
                    }
                }
            }); // addEventListener
        }) // forEach
    });
    // DOMContentLoaded  end

    function showMenu() {
        var x = document.getElementById("myLinks");
        var y = document.getElementById("setting");
        y.style.display = "none";
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showSettings() {
        var x = document.getElementById("setting");
        var y = document.getElementById("myLinks");
        y.style.display = "none";
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    $(".dropbtn").click(function () {
        $(this).toggleClass("open");
        $(".language-dropdown .dropdown-content").toggleClass("show-drop");
    });
    $('.language-dropdown .dropdown-content a').click(function () {
        $('.dropbtn').removeClass('open');
        $('.language-dropdown .dropdown-content').removeClass('show-drop');
    });
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
@livewireScripts
<script type="text/javascript">
    Livewire.on('goToTop', () => {
        window.scrollTo({
            top: 350,
            left: 15,
            behaviour: 'smooth'
        })
    })
</script>
@stack(AppConst::PUSH_JS)
