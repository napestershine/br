<!DOCTYPE html>
<html>
<head>
    <title>Location</title>
    <meta charset="UTF-8">
    <style type="text/css" media="screen">
        body {
            color: #333;
        }

        body, input, button {
            line-height: 1.4;
            font: 13px Helvetica, arial, freesans, clean, sans-serif;
        }

        a {
            color: #4183C4;
            text-decoration: none;
        }

        #examples a {
            text-decoration: underline;
        }

        #geocomplete {
            width: 200px
        }

        #multiple li {
            cursor: pointer;
            text-decoration: underline;
        }

        form {
            width: 300px;
        }

        fieldset {
            width: 320px;
            margin-top: 20px
        }

        fieldset label {
            display: block;
            margin: 0.5em 0 0;
        }

        fieldset input {
            width: 95%;
        }
    </style>
</head>
<body>
<form id="first_form">
    <input id="first_geocomplete" type="text" placeholder="Type in an address" value="Empire State Bldg"/>
    <input id="first_find" type="button" value="find"/>
    <fieldset>
        <h3>Address-Details</h3>

        <label>Location Name</label>
        <input name="name" type="text" value="">

        <label>Address</label>
        <input name="formatted_address" type="text" value="">

        <label>City</label>
        <input name="locality" type="text" value="">

        <label>State</label>
        <input name="administrative_area_level_1" type="text" value="">

        <label>State 2</label>
        <input name="administrative_area_level_2" type="text" value="">

        <label>State 3</label>
        <input name="administrative_area_level_3" type="text" value="">

        <label>Postal Code</label>
        <input name="postal_code" type="text" value="">
    </fieldset>
</form>
<br/><br/>
<form id="second_form">
    <input id="second_geocomplete" type="text" placeholder="Type in an address" value="Empire State Bldg"/>
    <input id="second_find" type="button" value="find"/>
    <fieldset>
        <h3>Address-Details</h3>

        <label>Location Name</label>
        <input name="name" type="text" value="">

        <label>Address</label>
        <input name="formatted_address" type="text" value="">

        <label>City</label>
        <input name="locality" type="text" value="">

        <label>State</label>
        <input name="administrative_area_level_1" type="text" value="">

        <label>Postal Code</label>
        <input name="postal_code" type="text" value="">
    </fieldset>
</form>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/jquery.geocomplete.min.js"></script>
<script>
    $(function () {
        $("#first_geocomplete").geocomplete({
            details: "#first_form",
            types: ["geocode", "establishment"]
        });

        $("#first_find").click(function () {
            $("#first_geocomplete").trigger("geocode");
        });
    });

    $(function () {
        $("#second_geocomplete").geocomplete({
            details: "#second_form",
            types: ["geocode", "establishment"]
        });

        $("#second_find").click(function () {
            $("#second_geocomplete").trigger("geocode");
        });
    });
</script>
</body>
</html>

