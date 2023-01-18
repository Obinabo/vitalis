 <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©  <?php echo $site_title; ?>  &copy; <script type="text/javascript">
var d = new Date()
document.write(d.getFullYear())
</script></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Secured <?php echo $site_title; ?> Online Banking </span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assetsdash/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assetsdash/vendors/chart.js/Chart.min.js"></script>
    <script src="../assetsdash/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.resize.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.categories.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.stack.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assetsdash/js/off-canvas.js"></script>
    <script src="../assetsdash/js/hoverable-collapse.js"></script>
    <script src="../assetsdash/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assetsdash/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    
    
    
<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62b6f037b0d10b6f3e7944f5/1g6d9kmv0';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

  </body>
  <?php echo $live_chat_id; ?>
</html>