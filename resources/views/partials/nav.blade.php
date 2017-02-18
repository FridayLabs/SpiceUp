<ul class="nav navbar-nav">
    <li class="{{ Request::is('screens/*') || Request::is('screens') ? 'active' : '' }}">
        <a href="{{ action('ScreenController@index') }}">Screens</a>
    </li>
    <li class="{{ Request::is('tournaments/*') || Request::is('tournaments') ? 'active' : '' }}">
        <a href="{{ action('TournamentsController@index') }}">Tournaments</a>
    </li>
    <li class="{{ Request::is('games/*') || Request::is('games') ? 'active' : '' }}">
        <a href="{{ action('GamesController@index') }}">Games</a>
    </li>
    <li class="{{ Request::is('teams/*') || Request::is('teams') ? 'active' : '' }}">
        <a href="{{ action('TeamsController@index') }}">Teams</a>
    </li>
</ul>