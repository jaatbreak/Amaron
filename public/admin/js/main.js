"use strict";
let menu, animate, isRtl = window.Helpers.isRtl(), isDarkStyle = window.Helpers.isDarkStyle(), isHorizontalLayout = !1;
document.getElementById("layout-menu") && (isHorizontalLayout = document.getElementById("layout-menu").classList.contains("menu-horizontal")),
function() {
    "undefined" != typeof Waves && (Waves.init(),
    Waves.attach(".btn[class*='btn-']:not([class*='btn-outline-']):not([class*='btn-label-'])", ["waves-light"]),
    Waves.attach("[class*='btn-outline-']"),
    Waves.attach("[class*='btn-label-']"),
    Waves.attach(".pagination .page-item .page-link")),
    document.querySelectorAll("#layout-menu").forEach((function(e) {
        menu = new Menu(e,{
            orientation: isHorizontalLayout ? "horizontal" : "vertical",
            closeChildren: !!isHorizontalLayout,
            showDropdownOnHover: localStorage.getItem("templateCustomizer-" + templateName + "--ShowDropdownOnHover") ? "true" === localStorage.getItem("templateCustomizer-" + templateName + "--ShowDropdownOnHover") : void 0 === window.templateCustomizer || window.templateCustomizer.settings.defaultShowDropdownOnHover
        }),
        window.Helpers.scrollToActive(animate = !1),
        window.Helpers.mainMenu = menu
    }
    )),
    document.querySelectorAll(".layout-menu-toggle").forEach((e=>{
        e.addEventListener("click", (e=>{
            if (e.preventDefault(),
            window.Helpers.toggleCollapsed(),
            config.enableMenuLocalStorage && !window.Helpers.isSmallScreen())
                try {
                    localStorage.setItem("templateCustomizer-" + templateName + "--LayoutCollapsed", String(window.Helpers.isCollapsed()))
                } catch (e) {}
        }
        ))
    }
    )),
    window.Helpers.swipeIn(".drag-target", (function(e) {
        window.Helpers.setCollapsed(!1)
    }
    )),
    window.Helpers.swipeOut("#layout-menu", (function(e) {
        window.Helpers.isSmallScreen() && window.Helpers.setCollapsed(!0)
    }
    ));
    let e = document.getElementsByClassName("menu-inner")
      , t = document.getElementsByClassName("menu-inner-shadow")[0];
    0 < e.length && t && e[0].addEventListener("ps-scroll-y", (function() {
        this.querySelector(".ps__thumb-y").offsetTop ? t.style.display = "block" : t.style.display = "none"
    }
    ));
    var a = document.querySelector(".style-switcher-toggle");
    function s(e) {
        [].slice.call(document.querySelectorAll("[data-app-" + e + "-img]")).map((function(t) {
            var a = t.getAttribute("data-app-" + e + "-img");
            t.src = assetsPath + "img/" + a
        }
        ))
    }
    window.templateCustomizer ? (a && a.addEventListener("click", (function() {
        window.Helpers.isLightStyle() ? window.templateCustomizer.setStyle("dark") : window.templateCustomizer.setStyle("light")
    }
    )),
    window.Helpers.isLightStyle() ? (a && (a.querySelector("i").classList.add("ti-moon-stars"),
    new bootstrap.Tooltip(a,{
        title: "Dark mode",
        fallbackPlacements: ["bottom"]
    })),
    s("light")) : (a && (a.querySelector("i").classList.add("ti-sun"),
    new bootstrap.Tooltip(a,{
        title: "Light mode",
        fallbackPlacements: ["bottom"]
    })),
    s("dark"))) : a.parentElement.remove(),
    "undefined" != typeof i18next && "undefined" != typeof i18NextHttpBackend && i18next.use(i18NextHttpBackend).init({
        lng: "en",
        debug: !1,
        fallbackLng: "en",
        backend: {
            loadPath: assetsPath + "json/locales/{{lng}}.json"
        },
        returnObjects: !0
    }).then((function(e) {
        l()
    }
    ));
    let n = document.getElementsByClassName("dropdown-language");
    if (n.length) {
        var o = n[0].querySelectorAll(".dropdown-item");
        for (let e = 0; e < o.length; e++)
            o[e].addEventListener("click", (function() {
                var e, t = this.getAttribute("data-language"), a = this.querySelector(".fi").getAttribute("class");
                for (e of this.parentNode.children)
                    e.classList.remove("selected");
                this.classList.add("selected"),
                n[0].querySelector(".dropdown-toggle .fi").className = a,
                i18next.changeLanguage(t, ((e,t)=>{
                    if (e)
                        return console.log("something went wrong loading", e);
                    l()
                }
                ))
            }
            ))
    }
    function l() {
        var e = document.querySelectorAll("[data-i18n]")
          , t = document.querySelector('.dropdown-item[data-language="' + i18next.language + '"]');
        t && t.click(),
        e.forEach((function(e) {
            e.innerHTML = i18next.t(e.dataset.i18n)
        }
        ))
    }
    function i(e) {
        "show.bs.collapse" == e.type || "show.bs.collapse" == e.type ? e.target.closest(".accordion-item").classList.add("active") : e.target.closest(".accordion-item").classList.remove("active")
    }
    a = document.querySelector(".dropdown-notifications-all");
    const r = document.querySelectorAll(".dropdown-notifications-read");
    if (a && a.addEventListener("click", (e=>{
        r.forEach((e=>{
            e.closest(".dropdown-notifications-item").classList.add("marked-as-read")
        }
        ))
    }
    )),
    r && r.forEach((e=>{
        e.addEventListener("click", (t=>{
            e.closest(".dropdown-notifications-item").classList.toggle("marked-as-read")
        }
        ))
    }
    )),
    document.querySelectorAll(".dropdown-notifications-archive").forEach((e=>{
        e.addEventListener("click", (t=>{
            e.closest(".dropdown-notifications-item").remove()
        }
        ))
    }
    )),
    [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((function(e) {
        return new bootstrap.Tooltip(e)
    }
    )),
    [].slice.call(document.querySelectorAll(".accordion")).map((function(e) {
        e.addEventListener("show.bs.collapse", i),
        e.addEventListener("hide.bs.collapse", i)
    }
    )),
    isRtl && Helpers._addClass("dropdown-menu-end", document.querySelectorAll("#layout-navbar .dropdown-menu")),
    window.Helpers.setAutoUpdate(!0),
    window.Helpers.initPasswordToggle(),
    window.Helpers.initSpeechToText(),
    window.Helpers.initNavbarDropdownScrollbar(),
    window.addEventListener("resize", (function(e) {
        window.innerWidth >= window.Helpers.LAYOUT_BREAKPOINT && document.querySelector(".search-input-wrapper") && (document.querySelector(".search-input-wrapper").classList.add("d-none"),
        document.querySelector(".search-input").value = ""),
        document.querySelector("[data-template^='horizontal-menu']") && setTimeout((function() {
            window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT ? document.getElementById("layout-menu") && document.getElementById("layout-menu").classList.contains("menu-horizontal") && menu.switchMenu("vertical") : document.getElementById("layout-menu") && document.getElementById("layout-menu").classList.contains("menu-vertical") && menu.switchMenu("horizontal")
        }
        ), 100)
    }
    ), !0),
    !isHorizontalLayout && !window.Helpers.isSmallScreen() && ("undefined" != typeof TemplateCustomizer && window.templateCustomizer.settings.defaultMenuCollapsed && window.Helpers.setCollapsed(!0, !1),
    "undefined" != typeof config && config.enableMenuLocalStorage))
        try {
            null !== localStorage.getItem("templateCustomizer-" + templateName + "--LayoutCollapsed") && "false" !== localStorage.getItem("templateCustomizer-" + templateName + "--LayoutCollapsed") && window.Helpers.setCollapsed("true" === localStorage.getItem("templateCustomizer-" + templateName + "--LayoutCollapsed"), !1)
        } catch (e) {}
}(),
"undefined" != typeof $ && $((function() {
    window.Helpers.initSidebarToggle();
    var e, t, a, s = $(".search-toggler"), n = $(".search-input-wrapper"), o = $(".search-input"), l = $(".content-backdrop");
    s.length && s.on("click", (function() {
        n.length && (n.toggleClass("d-none"),
        o.focus())
    }
    )),
    $(document).on("keydown", (function(e) {
        var t = e.ctrlKey;
        e = 191 === e.which;
        t && e && n.length && (n.toggleClass("d-none"),
        o.focus())
    }
    )),
    o.on("focus", (function() {
        n.hasClass("container-xxl") && n.find(".twitter-typeahead").addClass("container-xxl")
    }
    )),
    o.length && (e = function(e) {
        return function(t, a) {
            let s;
            s = [],
            e.filter((function(e) {
                if (e.name.toLowerCase().startsWith(t.toLowerCase()))
                    s.push(e);
                else {
                    if (e.name.toLowerCase().startsWith(t.toLowerCase()) || !e.name.toLowerCase().includes(t.toLowerCase()))
                        return [];
                    s.push(e),
                    s.sort((function(e, t) {
                        return t.name < e.name ? 1 : -1
                    }
                    ))
                }
            }
            )),
            a(s)
        }
    }
    ,
    s = "search-vertical.json",
    $("#layout-menu").hasClass("menu-horizontal") && (s = "search-horizontal.json"),
  
    
    $(".navbar-search-suggestion").each((function() {
        a = new PerfectScrollbar($(this)[0],{
            wheelPropagation: !1,
            suppressScrollX: !0
        })
    }
    )),
    o.on("keyup", (function() {
        a.update()
    }
    )))
}
));
