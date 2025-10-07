<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
            font-size: 1.6rem;
            font-family: sans-serif;
        }
        table{
            border-collapse: collapse;
            margin: auto;
        }
        td, tr{
            border: solid 1px black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2>Lotería, escoge tus números:</h2>
    <form action="resultado.php" method="post">
        <table>
            <tr>
                <td><input type="checkbox" name="n1" value="1">1</td>
                <td><input type="checkbox" name="n2" value="2">2</td>
                <td><input type="checkbox" name="n3" value="3">3</td>
                <td><input type="checkbox" name="n4" value="4">4</td>
                <td><input type="checkbox" name="n5" value="5">5</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="n6" value="6">6</td>
                <td><input type="checkbox" name="n7" value="7">7</td>
                <td><input type="checkbox" name="n8" value="8">8</td>
                <td><input type="checkbox" name="n9" value="9">9</td>
                <td><input type="checkbox" name="n10" value="10">10</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="n11" value="11">11</td>
                <td><input type="checkbox" name="n12" value="12">12</td>
                <td><input type="checkbox" name="n13" value="13">13</td>
                <td><input type="checkbox" name="n14" value="14">14</td>
                <td><input type="checkbox" name="n15" value="15">15</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="n16" value="16">16</td>
                <td><input type="checkbox" name="n17" value="17">17</td>
                <td><input type="checkbox" name="n18" value="18">18</td>
                <td><input type="checkbox" name="n19" value="19">19</td>
                <td><input type="checkbox" name="n20" value="20">20</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="n21" value="21">21</td>
                <td><input type="checkbox" name="n22" value="22">22</td>
                <td><input type="checkbox" name="n23" value="23">23</td>
                <td><input type="checkbox" name="n24" value="24">24</td>
                <td><input type="checkbox" name="n25" value="25">25</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="n21" value="26">26</td>
                <td><input type="checkbox" name="n22" value="27">27</td>
                <td><input type="checkbox" name="n23" value="28">28</td>
                <td><input type="checkbox" name="n24" value="29">29</td>
                <td><input type="checkbox" name="n25" value="30">30</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="n21" value="31">31</td>
                <td><input type="checkbox" name="n22" value="32">32</td>
                <td><input type="checkbox" name="n23" value="33">33</td>
                <td><input type="checkbox" name="n24" value="34">34</td>
                <td><input type="checkbox" name="n25" value="35">35</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="n21" value="36">36</td>
                <td><input type="checkbox" name="n22" value="37">37</td>
                <td><input type="checkbox" name="n23" value="38">38</td>
                <td><input type="checkbox" name="n24" value="39">39</td>
                <td><input type="checkbox" name="n25" value="40">40</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="n21" value="41">41</td>
                <td><input type="checkbox" name="n22" value="42">42</td>
                <td><input type="checkbox" name="n23" value="43">43</td>
                <td><input type="checkbox" name="n24" value="44">44</td>
                <td><input type="checkbox" name="n25" value="45">45</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="n21" value="46">46</td>
                <td><input type="checkbox" name="n22" value="47">47</td>
                <td><input type="checkbox" name="n23" value="48">48</td>
                <td><input type="checkbox" name="n24" value="49">49</td>
                <td><input type="checkbox" name="n25" value="50">50</td>
            </tr>
        </table>
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>