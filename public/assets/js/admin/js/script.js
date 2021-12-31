const charts = document.querySelectorAll(".chart");

charts.forEach(function (chart) {
    var ctx = chart.getContext("2d");
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [
                {
                    label: "# of Votes",
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
});

$(document).ready(function () {
    $(".data-table").each(function (_, table) {
        $(table).DataTable();
    });

    $("#createProductImageInput").on("change", function (e) {
        var file = e.target.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#createProductImage").attr("src", e.target.result.toString());
        };
        reader.readAsDataURL(file);
    });

    $("#addnewcatalog").click(function(){
        var container = document.getElementById("addnewcatalogcontainer");
        while (container.hasChildNodes()) {
            container.removeChild(container.lastChild);
        }
        var input = document.createElement("input");
        input.type = "text";
        input.name = "tambahkatalog";
        input.id   = "tambahkatalog";
        input.tabIndex = "10";
        input.placeholder = "Tambahkan kategori baru";
        container.appendChild(input);
        container.appendChild(document.createElement("br"));
    });

    $("#addspecsopt").click(function(){
        $("#kondisiproduk2").show();
        $("#tinggiproduk2").show();
        $("#hargaproduk2").show();
        $("#kondisiproduk3").show();
        $("#tinggiproduk3").show();
        $("#hargaproduk3").show();
        $("#titlekondisiproduk2").show();
        $("#titletinggiproduk2").show();
        $("#titlehargaproduk2").show();
        $("#titlekondisiproduk3").show();
        $("#titletinggiproduk3").show();
        $("#titlehargaproduk3").show();
        $("#gajadiaddspecsopt").show();
        $("#addspecsopt").hide();
    });
    $("#gajadiaddspecsopt").click(function(){
        $("#kondisiproduk2").hide();
        $("#tinggiproduk2").hide();
        $("#hargaproduk2").hide();
        $("#kondisiproduk3").hide();
        $("#tinggiproduk3").hide();
        $("#hargaproduk3").hide();
        $("#titlekondisiproduk2").hide();
        $("#titletinggiproduk2").hide();
        $("#titlehargaproduk2").hide();
        $("#titlekondisiproduk3").hide();
        $("#titletinggiproduk3").hide();
        $("#titlehargaproduk3").hide();
        $("#addspecsopt").show();
        $("#gajadiaddspecsopt").hide();
    });
    $("#gajadiaddspecsopt").hide();
    $("#kondisiproduk2").hide();
    $("#tinggiproduk2").hide();
    $("#hargaproduk2").hide();
    $("#kondisiproduk3").hide();
    $("#tinggiproduk3").hide();
    $("#hargaproduk3").hide();
    $("#titlekondisiproduk2").hide();
    $("#titletinggiproduk2").hide();
    $("#titlehargaproduk2").hide();
    $("#titlekondisiproduk3").hide();
    $("#titletinggiproduk3").hide();
    $("#titlehargaproduk3").hide();

    $("#__lpform_namaproduk").hide();
    $("#__lpform_namaproduk_icon").hide();

    $("#katalogproduk").on("change", function(){
        var selectedPackage = $('#katalogproduk').val();
        var info1 = document.getElementById("titleinfo1input");
            while (info1.hasChildNodes()) {
                info1.removeChild(info1.lastChild);
        }
        var info2 = document.getElementById("titleinfo2input");
            while (info2.hasChildNodes()) {
                info2.removeChild(info2.lastChild);
        }
        var info3 = document.getElementById("titleinfo3input");
            while (info3.hasChildNodes()) {
                info3.removeChild(info3.lastChild);
        }
        if(selectedPackage == 1){
            
            $('#titleinfo1').text("Cahaya");
            var info1input = document.createElement("input");
            info1input.type = "text";
            info1input.name = "titleinfoproduk1";
            info1input.id   = "titleinfoproduk1";
            info1input.value  = "sunlight";
            info1input.hidden = true;
            info1.appendChild(info1input);

            $('#titleinfo2').text("Air");
            var info2input = document.createElement("input");
            info2input.type = "text";
            info2input.name = "titleinfoproduk2";
            info2input.id   = "titleinfoproduk2";
            info2input.value  = "water";
            info2input.hidden = true;
            info2.appendChild(info2input);

            $('#titleinfo3').text("Suhu");
            var info3input = document.createElement("input");
            info3input.type = "text";
            info3input.name = "titleinfoproduk3";
            info3input.id   = "titleinfoproduk3";
            info3input.value  = "temp";
            info3input.hidden = true;
            info3.appendChild(info3input);


        }else{
            $('#titleinfo1').text("Title Informasi 1");
            var info1input = document.createElement("input");
            info1input.type = "text";
            info1input.name = "titleinfoproduk1";
            info1input.id   = "titleinfoproduk1";
            info1input.tabIndex = "10";
            info1input.placeholder = "Tambahkan Parameter 1";
            info1.appendChild(info1input);
            
            $('#titleinfo2').text("Title Informasi 2");
            var info2input = document.createElement("input");
            info2input.type = "text";
            info2input.name = "titleinfoproduk2";
            info2input.id   = "titleinfoproduk2";
            info2input.tabIndex = "10";
            info2input.placeholder = "Tambahkan Parameter 2";
            info2.appendChild(info2input);

            $('#titleinfo3').text("Title Informasi 3");
            var info3input = document.createElement("input");
            info3input.type = "text";
            info3input.name = "titleinfoproduk3";
            info3input.id   = "titleinfoproduk3";
            info3input.tabIndex = "10";
            info3input.placeholder = "Tambahkan Parameter 3";
            info3.appendChild(info3input);
        }
    });

    var numb = $('#productprice').val();
    var format = numb.toString().split('').reverse().join('');
    var convert = format.match(/\d{1,3}/g);
    var rupiah = convert.join('.').split('').reverse().join('');
    $('#productprice').text(rupiah);
});
