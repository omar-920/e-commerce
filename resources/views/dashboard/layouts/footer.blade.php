<div id="search">
    <button type="button" class="close">×</button>
    <form>
      <input type="search" value="" placeholder="type keyword(s) here" />
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>
  
  

  <script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase().trim();
        let rows = document.querySelectorAll('#productsTable tr');

        rows.forEach(row => {
            let textContent = row.innerText.toLowerCase(); // البحث في جميع الأعمدة
            row.style.display = textContent.includes(filter) ? '' : 'none';
        });
    });
</script>
  
  <!-- jquery vendor -->
  <script src="{{asset('dashboard-assets/assets/js/lib/jquery.min.js')}}"></script>
  <script src="{{asset('dashboard-assets/assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
  <!-- nano scroller -->
  <script src="{{asset('dashboard-assets/assets/js/lib/menubar/sidebar.js')}}"></script>
  <script src="{{asset('dashboard-assets/assets/js/lib/preloader/pace.min.js')}}"></script>
  <!-- sidebar -->
  <script src="{{asset('dashboard-assets/assets/js/lib/bootstrap.min.js')}}">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  </script>
  <!-- bootstrap -->

  <script src="{{asset('dashboard-assets/assets/js/lib/morris-chart/raphael-min.js')}}"></script>
  <script src="{{asset('dashboard-assets/assets/js/lib/morris-chart/morris.js')}}"></script>
  <script src="{{asset('dashboard-assets/assets/js/lib/morris-chart/morris-init.js')}}"></script>


  <script src="{{asset('dashboard-assets/assets/js/scripts.js')}}"></script>
  <!-- scripit init-->
