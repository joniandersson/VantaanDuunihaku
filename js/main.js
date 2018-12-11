$( document ).ready(function() {

    // If small device, then tidy things up
    if ($(window).width() < 960) {
        $('#jobListings').removeClass('pl-2');
        $('#jobListings').addClass('pl-0 mt-2');
        $('#jumbotron').addClass('mb-2');
        /* When starting to scroll down the joblistings on mobile
        the window will scroll down so that the joblistings cover the whole screen */
        $('#jobListings').scroll(function () {
                $('html, body').animate({
                    scrollTop: $("#jobListings").offset().top
                }, 0);
                $('#top').fadeIn('slow');
        });
    }

    // Remove "back to top" button when scroll back up manually
    $(window).scroll(function () {
        var distance = $(this).scrollTop();
        if(distance < 300){
           $('#top').fadeOut('slow');
       }
    });

    // Scroll joblistings and main window to top by clicking "Back to top" button
    $('#top').click(function () {
        $('#jobListings').animate({
            scrollTop: $("#jumbotron").offset().top
        }, 500);
        setTimeout(function () {
            $('html, body').animate({
                scrollTop: $("#jumbotron").offset().top
            }, 500);
        },600);
        $('#top').fadeOut('slow');
    });

    // If not mobile device set a fitted content height in the ugliest way possible
    function fitScreen(){
        if ($(window).width() > 960) {
            // Set max height of container
            var windowHeight = $(window).height();
            var jumbotronHeight = $('#jumbotron').outerHeight();
            var perfectHeight = windowHeight - jumbotronHeight - 35;
            $('#jobListings,#searchFormDiv').css({
                'height': perfectHeight
            });
        }else{
            $('#jobListings').css({
                'height': '1000px'
            });
        }
    }
    fitScreen();

    // Also fit content height when resizing window
    $(window).resize(function () {
        fitScreen();
    });


    // Function to get amount of checked profession categories
    function checkedCategories(){
        var checked = $("#categoriesForm input:checkbox:checked").length;
        return checked;
    }
    $('#checkedNum').text(checkedCategories());

    // Prevent empty search by checking that atleast one filter is enabled
    function checkFilters() {
        if ($("#categoriesForm input:checkbox:checked").length > 0 || $('#sanahaku').val().length > 0) {
            $('#searchButton').prop('disabled', false);
        } else {
            $('#searchButton').prop('disabled', true);
        }
    }
    checkFilters();

    // Check filters again when making changes to them
    $('input').change(function () {
        checkFilters();
    });

    // Get to frontpage and reset by clicking logo
    $('#jumbotron').click(function () {
        window.location.href="index.php";
    })

    // Checks if there are table headers without table rows (professions without results after search)
    // and removes the table header
    if($('th').next().is('th')){
        $('th').next('th').prev().remove();
    }

    // Toggle for valitut ammattiryhmät
    $('#title').click(function () {
        $('#valitutDrop').slideToggle();
        if ($('#arrow').hasClass('fa fa-arrow-right')) {
            $('#arrow').removeClass('fa fa-arrow-right');
            $('#arrow').addClass('fa fa-arrow-down');
        }else{
            $('#arrow').removeClass('fa fa-arrow-down');
            $('#arrow').addClass('fa fa-arrow-right');
        }
    });

    //This function will add the chosen professions to the 'Valitut Ammattiryhmät' table
    function searchCategories(){
        // Clean the table
        $('#valitutTable > tr').remove();
        // Add a table row for each checked category
        [].forEach.call(document.querySelectorAll('input[type="checkbox"]:checked'), function(cb) {
            $('#valitutRow').after("<tr><td class=\"font-weight-light\">" + cb.value + "<img class='float-right' style='width: 25px;' src='img/remove.png'></td></tr>");
        });
        // Refresh the badge with the amount of choses categories
        $('#checkedNum').text(checkedCategories());
        // Remove chosen categories
        $('#valitutDrop td').click(function () {
            $(this).remove();
            var val = $(this).text();
            $('input:checkbox[value="' + val + '"]').trigger('click');
            // Keep badge updated
            checkedCategories();
            $('#checkedNum').text(checkedCategories());
        })
    }
    searchCategories();

    // When saving the chosen professions this function will add the chosen professions to the 'Valitut Ammattiryhmät' table
    $('#tallennaBtn').click(function () {
        searchCategories();
    });

    // When opening a joblisting a modal with the available information will show
    function openListingModal(){
        $('.jobListing').click(function () {
            $('#jobListingModal').modal('show');
            $('#jobTitle').text($(this).text().split(' ')[0]);
            $('#jobProfession').text("Ammattiryhmä: " + $(this).find('.jobProfession').text());
            $('#jobOrganisation').text($(this).find('.jobOrganisation').text());
            $('#jobSearchtime').text("Hakuaika päättyy: " + $(this).find('.jobSearchtime').text());
            var url = $(this).find('.jobLink').text();
            $('#lisatietoja').attr("href", url);
            $('#jobKey').text("Työavain: " + $(this).find('.jobKey').text());
        })
    }
    openListingModal();

     $('#jobListings').animate({
        scrollTop: '1px'
    }, 500);

    // Amount of job listings to show on landing page
    var showNum = 15;
    // Ajax GET request to display 15 job listings
    $.ajax({
        method: "POST",
        url: 'includes/allJobs.php',
        data:{
              'showAmount': showNum,
              'ajax':true
            },
        success: function(data) {
             $('#tableBody').html(data);
         }
     });

    // When scrolling to the bottom of Job listings, this function loads 20 more listings with AJAX
    $('#jobListings').on('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
            showNum += 20;
            // When all available job listings have been displayed, stop adding table rows and remove possible empty ones
            if (showNum > 255) {
                $('#tableBody tr').each(function () {
                    if (!$.trim($(this).text())) $(this).remove();
                });
            } else {
                $.ajax({
                    method: "POST",
                    url: 'includes/allJobs.php',
                    data: {
                        'showAmount': showNum,
                        'ajax': true
                    },
                    success: function (data) {
                        $('#tableBody').html(data);
                        $('#tableBody > tr').slice(-20).hide().fadeIn(600);
                    }
                });
            }
        }
            openListingModal();
        });
});