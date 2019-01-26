function myFunction() {
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var idnumber = document.getElementById("idnumber").value;
    var cell = document.getElementById("cell").value;
    var province = document.getElementById("province").value;
    var primarylang = document.getElementById("primarylang").value;
    var secondarylang = document.getElementById("secondarylang").value;
    
    var dataString = 'firstname1=' + firstname + '&lastname1=' + lastname + '&idnumber1=' + idnumber + '&cell1=' + cell + '&province1=' + province + '&primarylang1=' + primarylang+ '&secondarylang1=' + secondarylang;
    if (firstname == '' || lastname == '' || idnumber == '' || cell == '' || province || primarylang || secondarylang) {
    alert("Please Fill All Fields");
    } else {
    
    $.ajax({
    type: "POST",
    url: "ajaxjs.php",
    data: dataString,
    cache: true,
    success: function(results) {
    alert(results);
    }
    });
    }
    return true;
    }

    $(document).ready(function($) {
        $(".table-row").click(function() {
            window.document.location = $(this).data("href");
        });
    });