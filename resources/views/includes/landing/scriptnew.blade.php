<script>



    $( ".contactTab" ).on("click", function( event ) {
        event.preventDefault();

        $("#myTabContent .contactTabPane").addClass("fade");
        $("#myTabContent .contactTabPane").addClass("show");
        $("#myTabContent .contactTabPane").addClass("active");


        $("#myTabContent .aboutTabPane").removeClass("show");
        $("#myTabContent .aboutTabPane").removeClass("active");

 
    });

    $( ".aboutTab" ).on("click", function( event ) {
        event.preventDefault();


        $("#myTabContent .contactTabPane").removeClass("show");
        $("#myTabContent .contactTabPane").removeClass("active");


        $("#myTabContent .aboutTabPane").addClass("fade");
        $("#myTabContent .aboutTabPane").addClass("show");
        $("#myTabContent .aboutTabPane").addClass("active");

 
    });
</script>