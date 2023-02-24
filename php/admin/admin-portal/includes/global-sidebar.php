<?php

    // Parse current url
    $parsed_url = parse_url($_SERVER['REQUEST_URI']);//Parse Uri

    $path = '/';
    if(isset($parsed_url['path'])){
        $path = $parsed_url['path'];
    }

?>
    <aside id="left-sidebar-nav">
        <div id="left-sidebar" class="side-nav fixed">
            <ul class="leftside-navigation" data-path="<?php echo $path;?>">
                <li>
                    <a href="/admin/home" class="waves-effect waves-default active">
                        <i class="material-icons left-icon">dashboard</i>Dashboard
                    </a>
                </li>
                <li>
                    <a class="collapsible-header waves-effect waves-default">
                        <i class="material-icons left-icon">contacts</i>
                        <i class="material-icons right-icon right">arrow_drop_down</i> People
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/people/users" class="waves-effect waves-default"> Users </a></li>
                            <li><a href="/people/members" class="waves-effect waves-default"> Members </a></li>
                            <li><a href="/people/visitors" class="waves-effect waves-default"> Visitors </a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="collapsible-header waves-effect waves-default">
                        <i class="material-icons left-icon">question_answer</i>
                        <i class="material-icons right-icon right">arrow_drop_down</i> Messages
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/messages/mails" class="waves-effect waves-default"> Mails </a></li>
                            <li><a href="/messages/alerts" class="waves-effect waves-default"> Alerts </a></li>
                            <li><a href="/messages/chats" class="waves-effect waves-default"> Chats </a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="collapsible-header waves-effect waves-default">
                        <i class="material-icons left-icon">perm_media</i>
                        <i class="material-icons right-icon right">arrow_drop_down</i> Gallery
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/admin/gallery/photos" class="waves-effect waves-default"> Photos </a></li>
                            <li><a href="/admin/gallery/videos" class="waves-effect waves-default"> Videos </a></li>
                        </ul>
                    </div>
                </li>
                <li class="navigation"> Manage </li>
                <li>
                    <a class="collapsible-header waves-effect waves-default">
                        <i class="material-icons left-icon">web</i>
                        <i class="material-icons right-icon right">arrow_drop_down</i> Website
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/admin/website/sliders" class="waves-effect waves-default"> Sliders </a></li>
                            <li><a href="/admin/website/menus" class="waves-effect waves-default"> Menus </a></li>
                            <li><a href="/admin/website/pages" class="waves-effect waves-default"> Pages </a></li>
                            <li><a href="/admin/website/contents" class="waves-effect waves-default"> Contents </a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="collapsible-header waves-effect waves-default">
                        <i class="material-icons left-icon">assignment</i>
                        <i class="material-icons right-icon right">arrow_drop_down</i> Forms
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/forms/contact-us" class="waves-effect waves-default"> Contact Us</a></li>
                            <li><a href="/forms/maillist" class="waves-effect waves-default"> Mail List </a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="fixed sidebar-footer">
                <ul>
                    <li>
                        <a class="tooltipped" data-delay="0" data-position="top" data-tooltip="Feedback">
                            <i class="material-icons"> feedback </i>
                        </a>
                    </li>
                    <li>
                        <a class="tooltipped" data-delay="0" data-position="top" data-tooltip="Help">
                            <i class="material-icons"> help </i>
                        </a>
                    </li>
                    <li>
                        <a class="tooltipped" data-delay="0" data-position="top" data-tooltip="API">
                            <i class="material-icons"> code </i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>