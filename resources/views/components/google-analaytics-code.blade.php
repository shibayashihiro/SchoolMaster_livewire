@if(config('app.env','local') !== "local")
<!--  google analytics code  -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-E4M1557R4J"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-E4M1557R4J');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-210960734-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-210960734-1');
</script>
@endif
