<?php
session_start();
if (!isset($_SESSION['history'])) {
  $_SESSION['history'] = [];
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Lab_1</title>

  <style type="text/css">
    body {
      font-family: Roboto, sans-serif;
    }

    table {
      border-collapse: collapse;
    }

    table,
    td,
    th {
      border: 1px solid #2e2e2e;
    }

    td,
    th {
      padding: 5px;
    }

    .row[value="yes"] {
      background-color: rgba(0, 255, 0, 0.05);
      color: white;
    }

    .row[value="no"] {
      background-color: rgba(255, 0, 0, 0.05);
      color: white;
    }

    .result_header {
      background-color: #232324;
      color: white;
    }

    .btn_x.active {
      background-color: #e1e3e6;
      color: black;
    }

    .btn_x:hover {
      background-color: #e1e3e6;
      color: black;
    }

    .btn_x {
      margin: 6px;
      width: 44px;
      height: 28px;
      border: 0px solid #4c75a3;
      border-radius: 6px;
      margin-top: 10px;
      background-color: #454647;
      color: #e1e3e6;
    }

    body {
      background-color: #19191a;
    }

    .header {
      color: white;
      text-align: center;
      font-family: cursive;
      font-size: 30px;
    }

    #result {
      overflow: hidden;
      font-size: 110%;
      width: 80%;
      border-radius: 12px;
      text-align: center;
      max-width: 800px;
      margin: 0 auto;
    }

    .controls {
      text-align: center;
      display: inline-block;
      margin: 5px;
      vertical-align: top;
    }

    .img_and_controls {
      text-align: center;
      margin: 6px;
    }

    label {
      color: white;
    }

    .img {
      display: inline-block;
      margin: 16px;
      border-radius: 12px;
      overflow: hidden;
      height: 220px;
      height: 220px;
    }

    #y {
      width: 300px;
      height: 30px;
      border-radius: 8px;
      border-width: 1px;
      border-color: hsla(0, 0%, 100%, .12);
      background-color: #232324;
      padding-left: 12px;
      padding-right: 12px;
      color: white;
      margin-top: 8px;
    }

    #y.valid {
      border-color: #4bb34b;
    }

    #y.invalid {
      border-color: #ff5c5c;
      background-color: #522e2e;
    }

    #y::placeholder {
      color: #76787a;
    }

    #r {
      width: 324px;
      height: 30px;
      border-radius: 8px;
      border-color: hsla(0, 0%, 100%, .12);
      background-color: #232324;
      padding-left: 12px;
      padding-right: 24px;
      color: white;
      margin-top: 8px;
    }

    .control_el {
      margin: 6px;
    }

    .action_btns button {
      margin: 6px;
      height: 28px;
      border: 0px solid #4c75a3;
      border-radius: 6px;
      margin-top: 10px;
      padding: 0px 12px 0px 12px;
    }

    .clear {
      background-color: #454647;
      color: #e1e3e6;
    }

    .submit {
      background-color: #e1e3e6;
      color: black;
    }
  </style>
</head>

<body>
  <h1 class="header">Григорьев Андрей Сергеевич P32111 1304</h1>
  <div>
    <div class="img_and_controls">
      <div class="img">
        <img src="map.jpg" alt="map" class="map">
      </div>
      <div class="controls">
        <div class="control_el">
          <label for="x">X:</label>
          <div>
            <button type="button" class="btn_x" value="-5" onclick="setX(this.value)">-5</button>
            <button type="button" class="btn_x" value="-4" onclick="setX(this.value)">-4</button>
            <button type="button" class="btn_x" value="-3" onclick="setX(this.value)">-3</button>
            <button type="button" class="btn_x" value="-2" onclick="setX(this.value)">-2</button>
            <button type="button" class="btn_x active" value="-1" onclick="setX(this.value)">-1</button>
            <button type="button" class="btn_x" value="0" onclick="setX(this.value)">0</button>
            <button type="button" class="btn_x" value="1" onclick="setX(this.value)">1</button>
            <button type="button" class="btn_x" value="2" onclick="setX(this.value)">2</button>
            <button type="button" class="btn_x" value="3" onclick="setX(this.value)">3</button>
          </div>
        </div>

        <div class="control_el">
          <label for="y">Y:</label>
          <div>
            <input type="text" id="y" placeholder="(-3...3)">
          </div>
        </div>
        <div class="control_el">
          <label for="r">R:</label>
          <div>
            <select id="r">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
        </div>

        <div class="action_btns">
          <button class="submit" onclick="submit()">Submit</button>
          <button class="clear" onclick="reset()">Clear table</button>
        </div>
      </div>
    </div>
    <div>
      <table id="result">
        <tr class="result_header">
          <th>X</th>
          <th>Y</th>
          <th>R</th>
          <th>Current time</th>
          <th>Execution time</th>
          <th>Hit</th>
        </tr>
        <?php
        $history = $_SESSION['history'];
        foreach ($history as $row) {
          echo "<tr class='row'   value='" . strtolower($row['hit']) . "'>";
          echo "<td>" . $row['x'] . "</td>";
          echo "<td>" . $row['y'] . "</td>";
          echo "<td>" . $row['r'] . "</td>";
          echo "<td>" . $row['currentTime'] . "</td>";
          echo "<td>" . $row['executionTime'] . "</td>";
          echo "<td>" . $row['hit'] . "</td>";
          echo "</tr>";
        }
        ?>
      </table>
    </div>

    <script>
      if (typeof x === 'undefined') {
        x = -1;
      }


      function submit() {
        let y = document.getElementById("y").value;

        if (y === "") {
          alert("Y is empty");
          return;
        }

        if (y < -3 || y > 3) {
          alert("Y is not in range (-3...3)");
          return;
        }

        if (!(y >= -3 && y <= 3)) {
          alert("Y is not a number");
          return;
        }


        let request = new XMLHttpRequest();
        request.open("GET", "check.php?x=" + x + "&y=" + y + "&r=" + r.value, true);
        request.send();
        request.onload = function() {
          if (request.status == 200) {
            document.getElementById("result").innerHTML = request.responseText;
          } else {
            alert(request.statusText + ": " + request.responseText);
          }
        }
      }

      function reset() {
        let request = new XMLHttpRequest();
        request.open("GET", "reset.php", true);
        request.send();
        request.onload = function() {
          document.getElementById("result").innerHTML = request.responseText;
        }
      }

      function setX(value) {
        x = value;
        let buttons = document.getElementsByTagName("button");
        for (let i = 0; i < buttons.length; i++) {
          if (buttons[i].value == value) {
            buttons[i].classList.add("active");
          } else {
            buttons[i].classList.remove("active");
          }
        }
      }

      // validate y and recolor input in red if it is not valid
      document.getElementById("y").onblur = function() {
        let y = this.value;
        if (y == "") {
          this.classList.remove("valid");
          this.classList.remove("invalid");
          return;
        }

        if (y >= -3 && y <= 3) {
          this.classList.add("valid");
          this.classList.remove("invalid");
        } else {
          this.classList.add("invalid");
          this.classList.remove("valid");
        }
      }
    </script>
</body>

</html>