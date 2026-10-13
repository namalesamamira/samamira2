function open_tab(e, tabName) {
    //tabs
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName(tabName);
    for (i = 0; i < tabcontent.length; i++) {
        // tabcontent[i].style.display = "none";
        console.log(tabcontent[i]);
        tabcontent[i].className = tabcontent[i].className.replace(
            " active",
            "",
        );
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName(e.className);
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    // document.getElementById(target).style.display = "block";
    document.getElementById(e.dataset.target).className += " active";
    e.className += " active";
}
