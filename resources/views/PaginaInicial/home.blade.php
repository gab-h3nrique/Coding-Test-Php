<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body{
            background-color: #f5f5f5;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            letter-spacing: 0.4px;
            word-spacing: 0px;
            color: #707070;
            font-weight: 700;
            text-decoration: none;
            font-style: normal;
            font-variant: normal;
            text-transform: none;
        }
        main{
            display: flex; justify-content: center; align-items: center: heigth: 800px; 
        }
        div{
            display: flex; margin-top: 30px;
        }
        table{
            padding: 40px;
            border-radius: 50px;
            background: linear-gradient(145deg, #ffffff, #dddddd);
            box-shadow:  20px 20px 60px #d0d0d0,
            -20px -20px 60px #ffffff;
        }
        thead{
            padding: 10px;
        }
        td{
            color: #4370c9;
            font-size: bolder;
            text-align:center;
            padding: 16px;
            border-radius: 50px;
            background: #e0e0e0;
            box-shadow: inset 17px 17px 33px #bebebe,
            inset -17px -17px 33px #ffffff;
        }
        .me{
            text-align:center;
            height: 200px;
            width: 600px;
            margin-left: 50px;
            margin-top: 360px;
            border-radius: 50px;
            background: linear-gradient(145deg, #ffffff, #dddddd);
            box-shadow:  20px 20px 60px #d0d0d0,
            -20px -20px 60px #ffffff;
        }
    </style>
    <title>affiliates</title>
</head>
<body >
    <main>
       <div> 
            <table>
                <thead>
                    <th>Name</th><th>Distance</th>
                </thead>
                <tbody id="table">
                </tbody>
            </table>
        </td>
        <div>
            <div class="me">
                <p style="margin: 50px">
                    Hello, my name is <a style="color: #4370c9;text-decoration: none;font-size: bolder;"href="https://www.linkedin.com/in/gabriel-henrique-47ab76188/">Gabriel Henrique</a><br>
                        <br>
                    I´m Full stack developer,with experience in TypeScript, Laravel, Php, NodeJs and etc.
                </p>
            <div>
        <div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $( document ).ready(function() {
            affiliates()
        });  
        const affiliates = () => {
            $.ajax({
                url: "{{ route('affiliates') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'data': false,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    let office = data.office;
                    let affiliates = data.affiliates;
                    let sortedAffiliates = [];

                    affiliates.sort(function(a, b) {
                        if (a.distance < b.distance) {
                            return -1;
                        } else {
                            return true;
                        }
                    });
                    let html = '';
                    affiliates.forEach((person)=>{
                        if(person.distance <= 100) {
                            sortedAffiliates.push(person);
                            html += `<tr><td>${person.name}</td><td>${person.distance} km</td></tr>`;
                        }
                    })
                    $("#table").append(html);
                }
            })
        }
    </script>
</body>
</html>
