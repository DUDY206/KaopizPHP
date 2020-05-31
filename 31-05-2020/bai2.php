<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<?php
    class Calculator{
        public $num1;
        public $num2;

        public function __construct($num1,$num2)
        {
            $this->num1 = $num1;
            $this->num2 = $num2;

        }

        function add(){
            return (int)$this->num1+(int)$this->num2;
        }
        function mminus(){
            return (int)$this->num1-(int)$this->num2;
        }
        function devide(){
            return (int)$this->num1/(int)$this->num2;
        }
        function multiple(){
            return (int)$this->num1*(int)$this->num2;
        }
    }
    if(isset($_POST['submit'])){

        $cal = new Calculator($_POST['num1'],$_POST['num2']);
        if($_POST['calculator'] == 'add'){
            $_POST['result'] = $cal->add();
        }
        elseif ($_POST['calculator'] == 'minus'){
            $_POST['result'] = $cal->mminus();
        }
        elseif ($_POST['calculator'] == 'devide'){
            $_POST['result'] = $cal->devide();
        }
        else{
            $_POST['result'] = $cal->multiple();
        }
    }
?>
<form  method="post">
    <table border="1">
        <tr>
            <td><label for="num1">Num1</label></td>
            <td><input type="text" name="num1" id="num1" value="<?php echo isset
                ($_POST['num1']) ? $_POST['num1'] : '' ?>"></td>
        </tr>
        <tr>
            <td><label for="num2">Num2</label></td>
            <td><input type="text" name="num2" id="num2" value="<?php echo isset
                ($_POST['num2']) ? $_POST['num2'] : '' ?>"></td>
        </tr>
        <tr>
            <td><label for="calculator">Calculator</label></td>
            <td><select name="calculator" id="">
                    <option value="add">Add</option>
                    <option value="minus">Minus</option>
                    <option value="devide">Devide</option>
                    <option value="multiple">Multiple</option>
                </select></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Calculate" name="submit"
                                   onclick="return cal()"></td>
        </tr>
        <tr>
            <td><label for="result">Result</label></td>
            <td><input type="text" name="result" value="<?php echo isset
                ($_POST['result']) ? $_POST['result'] : '' ?>"></td>
        </tr>
    </table>
    <script >
        function cal() {
            var num1 = document.getElementById("num1").value;
            var num2 = document.getElementById("num2").value;
            if(num1 == '' || num2 == ''){
                alert('Numbers required');
                console.log('a');
            }

        }

    </script>


</form>
</body>
</html>
