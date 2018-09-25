@include('header')

<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <pre class="col-md-3" style="height: 400px;">
                <div class="custom_card">
                  <p><button class="custom_button">BUY USD/GBP #7705</button></p>
                  <div class="custom_container">
                    <h4><b>John Doe</b></h4>
                    <p>Architect & Engineer</p>
                  </div>
                </div>
                <div class="custom_card">
                  <p><button class="custom_button">SELL EUR/GPY #7745</button></p>
                  <div class="custom_container">
                    <h4><b>John Doe</b></h4>
                    <p>Architect & Engineer</p>
                  </div>
                </div>
                <div class="custom_card">
                  <p><button class="custom_button">BUY CFA/NGN #7205</button></p>
                  <div class="custom_container">
                    <h4><b>John Doe</b></h4>
                    <p>Architect & Engineer</p>
                  </div>
                </div>
            </pre>

            <div class="col-md-8">
                <div class="custom_tab">
                    <button class="tablinks" onclick="openCity(event, 'London')" style="width: 50%;" id="defaultOpen">CURRENTLY RUNNING</button>
                    <button class="tablinks" style="width: 50%;" onclick="openCity(event, 'Paris')">RECENTLY CLOSED</button>
                </div>

                <div id="London" class="custom_tabcontent">
                    <table class="custom_table">
                        <tr>
                            <th style="width:50%">Features</th>
                            <th>Basic</th>
                            <th>Pro</th>
                        </tr>
                        <tr>
                            <td>Sample text</td>
                            <td><i class="fa fa-remove"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Sample text</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Sample text</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Sample text</td>
                            <td><i class="fa fa-remove"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Sample text</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                    </table>
                </div>

                <div id="Paris" class="custom_tabcontent">
                    <table class="custom_table">
                        <tr>
                            <th style="width:50%">Features</th>
                            <th>Basic</th>
                            <th>Pro</th>
                        </tr>
                        <tr>
                            <td>Sample text</td>
                            <td><i class="fa fa-remove"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Sample text</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Sample text</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Sample text</td>
                            <td><i class="fa fa-remove"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Sample text</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                    </table>
                </div>

                <script>
                    function openCity(evt, cityName) {
                        let i, custom_tabcontent, tablinks;
                        custom_tabcontent = document.getElementsByClassName("custom_tabcontent");
                        for (i = 0; i < custom_tabcontent.length; i++) {
                            custom_tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";
                    }

                    // Get the element with id="defaultOpen" and click on it
                    document.getElementById("defaultOpen").click();
                </script>
            </div>
        </div>
    </div>
</div>

@include('footer')