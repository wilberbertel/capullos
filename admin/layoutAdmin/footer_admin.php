<!-- Essential javascripts for application to work-->
<script src="Assets/js/jquery-3.3.1.min.js"></script>
<script src="Assets/js/popper.min.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>
<script src="Assets/js/main.js"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- BS JavaScript -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="../includes/Highcharts-8.1.0/code/highcharts.js"></script>
<script src="../includes/Highcharts-8.1.0/code/exporting.js"></script>
<script src="../includes/Highcharts-8.1.0/code/highcharts-3d.js"></script>
<script src="../includes/Highcharts-8.1.0/code/modules/exporting.js"></script>
<script src="../includes/Highcharts-8.1.0/code/modules/export-data.js"></script>
<script src="../includes/Highcharts-8.1.0/code/modules/accessibility.js"></script>
<script src="Assets/js/functions_admin.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript" src="Assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="Assets/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$('#sampleTable').DataTable();
</script>

<!-- Google analytics script-->
<script type="text/javascript">
if (document.location.hostname == 'pratikborsadiya.in') {
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-72504830-1', 'auto');
    ga('send', 'pageview');
}
</script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="Assets/js/plugins/chart.js"></script>


<!-- Google analytics script-->
<script type="text/javascript">
if (document.location.hostname == "pratikborsadiya.in") {
    (function(i, s, o, g, r, a, m) {
        i["GoogleAnalyticsObject"] = r;
        (i[r] =
            i[r] ||
            function() {
                (i[r].q = i[r].q || []).push(arguments);
            }),
        (i[r].l = 1 * new Date());
        (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m);
    })(
        window,
        document,
        "script",
        "//www.google-analytics.com/analytics.js",
        "ga"
    );
    ga("create", "UA-72504830-1", "auto");
    ga("send", "pageview");
}
</script>

<!-- The javascript plugin to display page loading on top-->
<!-- Page specific javascripts-->
<script language="Javascript">
function imprSelec(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write(ficha.innerHTML);
    var css = ventimp.document.createElement("link");
    css.setAttribute("href", "Assets/css/main.css");
    css.setAttribute("rel", "stylesheet");
    css.setAttribute("type", "text/css");
    ventimp.document.head.appendChild(css);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
}
</script>

</body>

</html>