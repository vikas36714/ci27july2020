
</div>
<!-- Container Closing div -->

<footer id="footer">
    <h6>Developed by Vikas Gupta</h6>
    <p>© Copyright 2018-2020. </p>
</footer>

<script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/mdb/js/mdb.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="" async defer></script>

<script>

$(document).ready(function(){
    var url = window.location;
        $('ul.navbar-nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.navbar-nav a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');

})


// ajax function calling //
    ajaxproduct(page_url = false);

// reset data from searching //
    $(document).on('click', '#resetBtn', function() {
        $('#search_key').val('');
        ajaxproduct(page_url = false);
        return false;
    })

// searching products //
    $(document).on('click', '#searchBtn', function() {
        ajaxproduct(page_url = false);
        return false;
    });

// pagination url geting //
    $(document).on('click', '.pagination li a', function() {
        var page_url = $(this).attr('href');
        ajaxproduct(page_url);
        return false;
    });
 
// fetching Products data //

    function ajaxproduct(page_url) {
        var search_key = $('#search_key').val();
        var dataString = 'search_key=' + search_key;
        var base_url = '<?php echo site_url('products/index_ajax'); ?>';

        if (page_url) {
            base_url = page_url;
        }

        $.ajax({
            type: 'POST',
            url: base_url,
            data: dataString,
            success: function(res) {
                $('#ajaxContent').html(res);
            }
        });
    }

// Contact form data submiting //
    $(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            var contactForm = $(this);
            $.ajax({
                url: contactForm.attr('action'),
                method: 'POST',
                data: contactForm.serialize(),
                success: function(res) {
                    if (res.status == 'success') {
                        $('#contactForm').hide();
                    }
                    $('#message').html(res.message);
                }
            })
        })
    })
</script>
</body>

</html>