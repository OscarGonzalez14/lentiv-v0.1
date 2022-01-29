<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
    <script src="https://unpkg.com/vue@next"></script>
    <script >
       function myFun(a, b, ...manyMoreArgs) {
       console.log("a", a);
       console.log("b", b);
       console.log("manyMoreArgs", manyMoreArgs);
}

myFun("one", "two", "three", "four", "five", "six");
    </script>
</body>
</html>