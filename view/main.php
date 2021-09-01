
<div class="sticky">
    <?=$menu?>
</div>

<div id="contentPos">

    <h1 class="center" title="About wtf is this.">CSS begin</h1>
    <div id="link">
        <a href="https://www.go.com/">Apasa aici pentru a cunoaste lumea durerii.</a><br/>
        <a href="https://www.facebook.com">Apasa aici pentru a cunoaste lumea placerii.</a>
    </div>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
        in culpa qui officia deserunt mollit anim id est laborum.
    </p> <br/>

    <div class="responsive">
        <div class="boxForm">
            <span style="background-color: #3c763d; padding: 6px; font-size: 20px; margin-bottom: 20px; border-radius: 5px; cursor: pointer" onclick="toggle_form()"> Hover here for visualize \/ </span><br/>
            <form action="/testSite/" method="post" class="form" id="user_form" style="display: none;" >
                <div style="color: black; font-size: 2em">
                    Introduceti un User in db:
                </div>
                Numele: <br/> <input type="text" name="fName"><br/>
                Prenumele:<br/> <input type="text" name="lName"><br/>
                Varsta:<br/> <input type="number" name="age"><br/>
                <button type="button" onclick="save_User()">save</button>
                <input type="hidden" name="action" value="new_user">
            </form>
        </div>
    </div>
    <?=$body?>
    <div class="clearfix"></div>

    <p>Lorem ipsum</p>
    <div class="clearfix">
        <div class="box">
            Lorem Ipsum.
        </div>
        <div class="box">
            Lorem Ipsum.
        </div>
        <div class="box">
            Lorem Ipsum.
        </div>
    </div>
</div>
