<div id="switcher" class="">
    <div class="content-switcher">
        <h4>STYLE SWITCHER</h4>
        <ul>
            <li>
                <a href="{{route('switchStyle',['color' => 'purple'])}}" onclick="setActiveStyleSheet('purple');" title="purple" class="color"><img src="{{asset('frontend/img/styleswitcher/purple.png')}}" alt="purple"/></a>
            </li>
            <li>
                <a href="{{route('switchStyle',['color' => 'red'])}}" onclick="setActiveStyleSheet('red');" title="red" class="color"><img src="{{asset('frontend/img/styleswitcher/red.png')}}" alt="red"/></a>
            </li>
            <li>
                <a href="{{route('switchStyle',['color' => 'blueviolet'])}}" onclick="setActiveStyleSheet('blueviolet');" title="blueviolet" class="color"><img src="{{asset('frontend/img/styleswitcher/blueviolet.png')}}" alt="blueviolet"/></a>
            </li>
            <li>
                <a href="{{route('switchStyle',['color' => 'blue'])}}" onclick="setActiveStyleSheet('blue');" title="blue" class="color"><img src="{{asset('frontend/img/styleswitcher/blue.png')}}" alt="blue"/></a>
            </li>
            <li>
                <a href="{{route('switchStyle',['color' => 'goldenrod'])}}" onclick="setActiveStyleSheet('goldenrod');" title="goldenrod" class="color"><img src="{{asset('frontend/img/styleswitcher/goldenrod.png')}}" alt="goldenrod"/></a>
            </li>
            <li>
                <a href="{{route('switchStyle',['color' => 'magenta'])}}" onclick="setActiveStyleSheet('magenta');" title="magenta" class="color"><img src="{{asset('frontend/img/styleswitcher/magenta.png')}}" alt="magenta"/></a>
            </li>
            <li>
                <a href="{{route('switchStyle',['color' => 'yellowgreen'])}}" onclick="setActiveStyleSheet('yellowgreen');" title="yellowgreen" class="color"><img src="{{asset('frontend/img/styleswitcher/yellowgreen.png')}}" alt="yellowgreen"/></a>
            </li>
            <li>
                <a href="{{route('switchStyle',['color' => 'orange'])}}" onclick="setActiveStyleSheet('orange');" title="orange" class="color"><img src="{{asset('frontend/img/styleswitcher/orange.png')}}" alt="orange"/></a>
            </li>
            <li>
                <a href="{{route('switchStyle',['color' => 'green'])}}" onclick="setActiveStyleSheet('green');" title="green" class="color"><img src="{{asset('frontend/img/styleswitcher/green.png')}}" alt="green"/></a>
            </li>
            <li>
                <a href="{{route('switchStyle',['color' => 'yellow'])}}" onclick="setActiveStyleSheet('yellow');" title="yellow" class="color"><img src="{{asset('frontend/img/styleswitcher/yellow.png')}}" alt="yellow"/></a>
            </li>
        </ul>
        <div id="hideSwitcher">&times;</div>
    </div>
</div>
<div id="showSwitcher" class="styleSecondColor"><i class="fa fa-cog fa-spin"></i></div>