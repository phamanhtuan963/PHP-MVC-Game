<html>
<head>
    <title>Add Game</title>
    <style>
        /*body{background:#59ABE3;margin:0}
        .form{width:340px;height:600px;background:#e6e6e6;border-radius:8px;box-shadow:0 0 40px -10px #000;margin:calc(50vh - 220px) auto;padding:20px 30px;max-width:calc(100vw - 40px);box-sizing:border-box;font-family:'Montserrat',sans-serif;position:relative}
        h2{margin:10px 0;padding-bottom:10px;width:180px;color:#78788c;border-bottom:3px solid #78788c}
        input{width:100%;padding:10px;box-sizing:border-box;background:none;outline:none;resize:none;border:0;font-family:'Montserrat',sans-serif;transition:all .3s;border-bottom:2px solid #bebed2}
        input:focus{border-bottom:2px solid #78788c}
        p:before{content:attr(type);display:block;margin:28px 0 0;font-size:14px;color:#5a5a5a}
        button{float:right;padding:8px 12px;margin:8px 0 0;font-family:'Montserrat',sans-serif;border:2px solid #78788c;background:0;color:#5a5a6e;cursor:pointer;transition:all .3s}
        button:hover{background:#78788c;color:#fff}
        div{content:'Hi';position:absolute;bottom:-15px;right:-20px;background:#50505a;color:#fff;width:320px;padding:16px 4px 16px 0;border-radius:6px;font-size:13px;box-shadow:10px 10px 40px -14px #000}
        span{margin:0 5px 0 15px}*/
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Roboto, -apple-system, 'Helvetica Neue', 'Segoe UI', Arial, sans-serif;
            background: #3b4465;
        }

        .forms-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .section-title {
            font-size: 32px;
            letter-spacing: 1px;
            color: #fff;
        }

        .forms {
            display: flex;
            align-items: flex-start;
            margin-top: 30px;
        }

        .form-wrapper {
            animation: hideLayer .3s ease-out forwards;
        }

        .form-wrapper.is-active {
            animation: showLayer .3s ease-in forwards;
        }

        @keyframes showLayer {
            50% {
                z-index: 1;
            }
            100% {
                z-index: 1;
            }
        }

        @keyframes hideLayer {
            0% {
                z-index: 1;
            }
            49.999% {
                z-index: 1;
            }
        }

        .switcher {
            position: relative;
            cursor: pointer;
            display: block;
            margin-right: auto;
            margin-left: auto;
            padding: 0;
            text-transform: uppercase;
            font-family: inherit;
            font-size: 16px;
            letter-spacing: .5px;
            color: #999;
            background-color: transparent;
            border: none;
            outline: none;
            transform: translateX(0);
            transition: all .3s ease-out;
        }

        .form-wrapper.is-active .switcher-login {
            color: #fff;
            transform: translateX(90px);
        }

        .form-wrapper.is-active .switcher-signup {
            color: #fff;
            transform: translateX(-90px);
        }

        .underline {
            position: absolute;
            bottom: -5px;
            left: 0;
            overflow: hidden;
            pointer-events: none;
            width: 100%;
            height: 2px;
        }

        .underline::before {
            content: '';
            position: absolute;
            top: 0;
            left: inherit;
            display: block;
            width: inherit;
            height: inherit;
            background-color: currentColor;
            transition: transform .2s ease-out;
        }

        .switcher-login .underline::before {
            transform: translateX(101%);
        }

        .switcher-signup .underline::before {
            transform: translateX(-101%);
        }

        .form-wrapper.is-active .underline::before {
            transform: translateX(0);
        }

        .form {
            overflow: hidden;
            min-width: 260px;
            margin-top: 50px;
            padding: 30px 25px;
            border-radius: 5px;
            transform-origin: top;
        }

        .form-login {
            animation: hideLogin .3s ease-out forwards;
        }

        .form-wrapper.is-active .form-login {
            animation: showLogin .3s ease-in forwards;
        }

        @keyframes showLogin {
            0% {
                background: #d7e7f1;
                transform: translate(40%, 10px);
            }
            50% {
                transform: translate(0, 0);
            }
            100% {
                background-color: #fff;
                transform: translate(35%, -20px);
            }
        }

        @keyframes hideLogin {
            0% {
                background-color: #fff;
                transform: translate(35%, -20px);
            }
            50% {
                transform: translate(0, 0);
            }
            100% {
                background: #d7e7f1;
                transform: translate(40%, 10px);
            }
        }

        .form-signup {
            animation: hideSignup .3s ease-out forwards;
        }

        .form-wrapper.is-active .form-signup {
            animation: showSignup .3s ease-in forwards;
        }

        @keyframes showSignup {
            0% {
                background: #d7e7f1;
                transform: translate(-40%, 10px) scaleY(.8);
            }
            50% {
                transform: translate(0, 0) scaleY(.8);
            }
            100% {
                background-color: #fff;
                transform: translate(-35%, -20px) scaleY(1);
            }
        }

        @keyframes hideSignup {
            0% {
                background-color: #fff;
                transform: translate(-35%, -20px) scaleY(1);
            }
            50% {
                transform: translate(0, 0) scaleY(.8);
            }
            100% {
                background: #d7e7f1;
                transform: translate(-40%, 10px) scaleY(.8);
            }
        }

        .form fieldset {
            position: relative;
            opacity: 0;
            margin: 0;
            padding: 0;
            border: 0;
            transition: all .3s ease-out;
        }

        .form-login fieldset {
            transform: translateX(-50%);
        }

        .form-signup fieldset {
            transform: translateX(50%);
        }

        .form-wrapper.is-active fieldset {
            opacity: 1;
            transform: translateX(0);
            transition: opacity .4s ease-in, transform .35s ease-in;
        }

        .form legend {
            position: absolute;
            overflow: hidden;
            width: 1px;
            height: 1px;
            clip: rect(0 0 0 0);
        }

        .input-block {
            margin-bottom: 20px;
        }

        .input-block label {
            font-size: 14px;
            color: #a1b4b4;
        }

        .input-block input {
            display: block;
            width: 100%;
            margin-top: 8px;
            padding-right: 15px;
            padding-left: 15px;
            font-size: 16px;
            line-height: 40px;
            color: #3b4465;
            background: #eef9fe;
            border: 1px solid #cddbef;
            border-radius: 2px;
        }

        .form [type='submit'] {
            opacity: 0;
            display: block;
            min-width: 120px;
            margin: 30px auto 10px;
            font-size: 18px;
            line-height: 40px;
            border-radius: 25px;
            border: none;
            transition: all .3s ease-out;
        }

        .form-wrapper.is-active .form [type='submit'] {
            opacity: 1;
            transform: translateX(0);
            transition: all .4s ease-in;
        }

        .btn-login {
            color: #fbfdff;
            background: #a7e245;
            transform: translateX(-30%);
        }

        .btn-signup {
            color: #a7e245;
            background: #fbfdff;
            box-shadow: inset 0 0 0 2px #a7e245;
            transform: translateX(30%);
        }

    </style>
</head>
<body>
<?php /*echo $result." success"; */?>
<!--<h1>Add</h1>-->

<!--<form action="../game/index.php" method="POST" enctype="multipart/form-data">
    <label>Title</label>
    <input type ="text" required="required" name="title" placeholder="Title"><br>
    <label>Price</label>
    <input type ="text" required="required" name="price" placeholder="Price"><br>
    <label>Image</label>
    <input type="file" name="image" /><br>
    <label>Producer</label>
    <input type ="text" required="required" name="producer" placeholder="Producer"><br>
    <label>Quantity</label>
    <input type ="text" required="required" name="quantity" placeholder="Quantity"><br>
    <button type="submit" name="submit">Add new game</button>
</form>-->
<!--<form class="form" action="../game/index.php" method="POST" enctype="multipart/form-data">
    <h2>Add new item</h2>
    <p type="Title:"><input type ="text" required="required" name="title" placeholder="Title"></input></p>
    <p type="Price:"><input type ="text" required="required" name="price" placeholder="Price"></input></p>
    <p type="Image:"><input type ="file" name="image" placeholder="image"></input></p>
    <p type="Producer:"><input type ="text" required="required" name="producer" placeholder="Producer"></input></p>
    <p type="Quantity:"><input type ="text" required="required" name="quantity" placeholder="Quantity"></input></p>
    <button type="submit" name="submit">Add new game</button>
    <button>Send Message</button>
</form>-->
<section class="forms-section">
    <h1 class="section-title">Welcome admin</h1>
    <div class="forms">
        <div class="form-wrapper is-active">
            <button type="button" class="switcher switcher-login">
                Add new item
                <span class="underline"></span>
            </button>
            <form class="form form-login" action="../game/index.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <!--<legend>Please, enter your email and password for login.</legend>-->
                    <div class="input-block">
                        <label>Title</label>
                        <p type="Title:"><input type ="text" required="required" name="title" placeholder="Title"></input></p>
                        <!--<input id="login-email" type="email" required>-->
                    </div>
                    <div class="input-block">
                        <label>Price</label>
                        <p type="Price:"><input type ="text" required="required" name="price" placeholder="Price"></input></p>
                    </div>
                    <div class="input-block">
                        <label>Image</label>
                        <p type="Image:"><input type ="file" name="image" placeholder="image"></input></p>
                    </div>
                    <div class="input-block">
                        <label>Producer</label>
                        <p type="Producer:"><input type ="text" required="required" name="producer" placeholder="Producer"></input></p>
                    </div>
                    <div class="input-block">
                        <label>Quantity</label>
                        <p type="Quantity:"><input type ="text" required="required" name="quantity" placeholder="Quantity"></input></p>
                    </div>
                </fieldset>
                <button class="btn-login" type="submit" name="submit">Add new game</button>
                <!--<button type="submit" class="btn-login">Login</button>-->
            </form>
        </div>
        <div class="form-wrapper">
            <button type="button" class="switcher switcher-signup">
                Import file
                <span class="underline"></span>
            </button>
            <form class="form form-signup" action="../game/index.php" method="POST" name="upload_excel" enctype="multipart/form-data">
                <fieldset>
                    <div class="input-block">
                        <label>Select File</label>
                        <p type="File:"><input type ="file" name="file" placeholder="file"></input></p>
                    </div>
                </fieldset>

                <button type="submit" id="submit" name="Import" class="btn-signup" data-loading-text="Loading...">Upload</button>
            </form>
        </div>
    </div>
</section>



<script>
    const switchers = [...document.querySelectorAll('.switcher')]

    switchers.forEach(item => {
        item.addEventListener('click', function() {
            switchers.forEach(item => item.parentElement.classList.remove('is-active'))
            this.parentElement.classList.add('is-active')
        })
    })
</script>
</body>
</html>