<div class="footer-wrapper">
    <div class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="footer-top-block">
                            <h2><i class="profession profession-logo"></i>JobConnect</h2>

                            <p>
                                Fusce congue, risus et pulvinar cursus, orci arcu tristique lectus, sit amet placerat justo ipsum eu diam. Pellentesque tortor urna, pellentesque nec molestie eget, volutpat in arcu. Maecenas a lectus mollis.
                            </p>

                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            </ul>
                        </div><!-- /.footer-top-block -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="footer-top-block">
                            <h2>Helpful Links</h2>

                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">License</a></li>
                                <li><a href="#">Affiliate</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div><!-- /.footer-top-block -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-3">
                        <div class="footer-top-block">
                            <h2>Trending Jobs</h2>

                            <ul>
                                <li><a href="companies.php">Android Developer</a></li>
                                <li><a href="companies.php">Senior Teamleader</a></li>
                                <li><a href="companies.php">iOS Developer</a></li>
                                <li><a href="companies.php">Junior Tester</a></li>
                                <li><a href="companies.php">Full Stack Developer</a></li>
                                <li><a href="companies.php">Node.js Developer</a></li>
                                <li><a href="companies.php">Scala Developer</a></li>
                            </ul>
                        </div><!-- /.footer-top-left -->
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.footer-top -->

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-left">
                    &copy; <a href="#">JobConnect</a>, 2015 All rights reserved.
                </div><!-- /.footer-bottom-left -->

                <div class="footer-bottom-right">
                   Premium themes and templates.
                </div><!-- /.footer-bottom-right -->
            </div><!-- /.container -->
        </div><!-- /.footer-bottom -->
    </div><!-- /.footer -->
</div><!-- /.footer-wrapper -->

</div><!-- /.page-wrapper -->

<div class="action-bar">
    <div class="action-bar-content">
        <div class="action-bar-chapter">
            <strong>Choose Page Layout</strong>

            <ul>
                <li><a href="#" data-action="layout-wide" class="active">Wide</a></li><li><a href="#" data-action="layout-boxed">Boxed</a></li>
            </ul>
        </div><!-- /.action-bar-chapter -->

        <div class="action-bar-chapter">
            <strong>Header Style</strong>

            <ul>
                <li><a href="#" class="active" data-action="header-light">Light</a></li><li><a href="#" data-action="header-dark">Dark</a></li>
            </ul>
        </div><!-- /.action-bar-chapter -->

        <div class="action-bar-chapter">
            <strong>Navigation Style</strong>

            <ul>
                <li><a href="#" data-action="navigation-light">Light</a></li><li><a href="#" class="active" data-action="navigation-dark">Dark</a></li>
            </ul>
        </div><!-- /.action-bar-chapter -->

        <div class="action-bar-chapter">
            <strong>Hero Content Style</strong>

            <ul>
                <li><a href="#" data-action="hero-content-light">Light</a></li><li><a href="#" class="active" data-action="hero-content-dark">Dark</a></li>
            </ul>
        </div><!-- /.action-bar-chapter -->

        <div class="action-bar-chapter">
            <strong>Footer Style</strong>

            <ul>
                <li><a href="#" data-action="footer-light">Light</a></li><li><a href="#"  class="active" data-action="footer-dark">Dark</a></li>
            </ul>
        </div><!-- /.action-bar-chapter -->

        <div class="action-bar-chapter">
            <strong>Color Combination</strong>

            <table>
                <tr>
                    <td><a href="assets/css/profession-purple-red.css">Purple / Red</a></td>
                    <td><a href="assets/css/profession-blue-cyan.css">Blue / Cyan</a></td>
                </tr>

                <tr>
                    <td><a href="assets/css/profession-gray-orange.css">Gray / Orange</a></td>
                    <td><a href="assets/css/profession-black-green.css" class="active">Black / Green</a></td>
                </tr>

                <tr>
                    <td><a href="assets/css/profession-blue-navy.css">Blue / Navy</a></td>
                    <td></td>
                </tr>
            </table>
        </div><!-- /.action-bar-chapter -->
    </div><!-- /.action-bar-content -->


</div><!-- /.action-bar -->


<script type="text/javascript" src="assets/js/jquery.js"></script>



<script>
        function searchTable() {
            // Get the input field and filter text
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            
            // Get the table and rows
            const table = document.getElementById('myTable');
            const rows = table.getElementsByTagName('tr');

            // Loop through all rows (skipping the header row)
            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let rowContainsFilter = false;

                // Check each cell in the row
                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].textContent.toLowerCase().indexOf(filter) > -1) {
                        rowContainsFilter = true;
                        break;
                    }
                }

                // Show or hide the row based on the filter
                rows[i].style.display = rowContainsFilter ? '' : 'none';
            }
        }
    </script>

<script type="text/javascript" src="assets/js/jquery.ezmark.js"></script>

<script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-select/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js"></script>

<script type="text/javascript" src="assets/libraries/cycle2/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="assets/libraries/cycle2/jquery.cycle2.carousel.min.js"></script>

<script type="text/javascript" src="assets/libraries/countup/countup.min.js"></script>

<script type="text/javascript" src="assets/js/profession.js"></script>


</body>

<!-- Mirrored from preview.byaviators.com/template/profession/candidates.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Aug 2018 11:09:12 GMT -->
</html>
