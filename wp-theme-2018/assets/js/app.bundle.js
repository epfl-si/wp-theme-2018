!function(e){function t(t){for(var o,i,s=t[0],c=t[1],l=t[2],d=0,p=[];d<s.length;d++)i=s[d],a[i]&&p.push(a[i][0]),a[i]=0;for(o in c)Object.prototype.hasOwnProperty.call(c,o)&&(e[o]=c[o]);for(u&&u(t);p.length;)p.shift()();return r.push.apply(r,l||[]),n()}function n(){for(var e,t=0;t<r.length;t++){for(var n=r[t],o=!0,s=1;s<n.length;s++){var c=n[s];0!==a[c]&&(o=!1)}o&&(r.splice(t--,1),e=i(i.s=n[0]))}return e}var o={},a={0:0},r=[];function i(t){if(o[t])return o[t].exports;var n=o[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,i),n.l=!0,n.exports}i.m=e,i.c=o,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)i.d(n,o,function(t){return e[t]}.bind(null,o));return n},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="";var s=window.webpackJsonp=window.webpackJsonp||[],c=s.push.bind(s);s.push=t,s=s.slice();for(var l=0;l<s.length;l++)t(s[l]);var u=c;r.push([22,1]),n()}({22:function(e,t,n){"use strict";n.r(t);var o=n(8),a=n.n(o),r=function(){var e=!1,t=!1,n=!1,o=new Date;new Date(o.getFullYear(),o.getMonth(),o.getDate());function a(e,t){return 7===$("tbody tr:nth-child(".concat(e,") .picker__day--outfocus"),t).length}$(".datepicker-fancy").each(function(){var r=["Jan","Fév","Mar","Avr","Mai","Jui","Jui","Aoû","Sep","Oct","Nov","Déc"],i=$(this).parent();$(this).pickadate({monthsFull:["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"],monthsShort:r,weekdaysFull:["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"],weekdaysShort:["Dim","Lun","Mar","Mer","Jeu","Ven","Sam"],labelMonthNext:"Prochain mois",labelMonthPrev:"Mois précédent",labelMonthSelect:"Sélectionnez un mois",labelYearSelect:"Sélectionnez une année",format:"d mmmm yyyy",firstDay:1,today:"",clear:"",close:"",onRender:function(){!function(e,t){if($(".nextMonthLabel",e.$holder).length>0)return!0;var n=e.component.$node.parent(),o=$(".nextMonthLabel",n),a=$(".prevMonthLabel",n),r=e.component.item.view.month+1;r===t.length&&(r=0);var i=e.component.item.view.month-1;i<0&&(i=11),o.html(t[r]),a.html(t[i]),$(".picker__box",e.$root).append(o.clone()),$(".picker__box",e.$root).append(a.clone())}(this,r),e&&function(o,r){var i=$("tr",o).index($("tr:has(.picker__day--selected)",o));if(n&&(i=n,n=!1),!e)return o;t&&(t=!1,i=6,a(6,o)&&(i=5)),$("tbody",o).attr("data-week",i),$(".picker__nav--next",o).on("click",function(e){i<6&&!a(i+1,o)?(e.stopPropagation(),i+=1,$("tbody",o).css("transition","left 0.4s"),$("tbody",o).attr("data-week",i)):i=1}),$(".picker__nav--prev",o).on("click",function(e){i>1?(e.stopPropagation(),i-=1,$("tbody",o).css("transition","left 0.4s"),$("tbody",o).attr("data-week",i)):t=!0}),$(".picker__day",o).each(function(){$(this).on("click",function(){$(this).parent().parent().parent().css("transition","left 0s")})})}(i)},onStart:function(){this.set("select",[o.getFullYear(),o.getMonth(),o.getDate()]),function(e){$(".picker__day--infocus",e).each(function(){var e=$(this).data("pick"),t=new Date(e);"2018-03-28"==="".concat(t.getFullYear(),"-").concat("0".concat(t.getMonth()+1).slice(-2),"-").concat("0".concat(t.getDate()).slice(-2))&&$(this).addClass("custom-highlight")})}(this);var t=$("tr:has(.picker__day--selected)",i);t.length>0&&(n=$("tr",i).index(t)),e="block"===$(".datepicker-fancy + .picker table").css("display")}})})},i=n(2),s=n.n(i),c=(n(20),n(21),n(3)),l=n.n(c),u=function(){var e="current-menu-parent",t=function(){var e=arguments.length>0&&void 0!==arguments[0]&&arguments[0],t=$("#nav-toggle");t.toggleClass("open");var n=t.offset().left+t.outerWidth(!0),o=t.offset().top-$(window).scrollTop();$(".nav-main").css("top",o),$("body").toggleClass("desktop-menu-open"),e&&$("body").hasClass("desktop-menu-open")?$(".nav-main").css("left",n):$(".nav-main").css("left","")};$(".nav-main .nav-back a").on("click",function(t){t.preventDefault();var n=$(this).parents(),o=n[2];$(o).removeClass("current-menu-ancestor").removeClass(e);var a=n[4];$(a).removeClass("current-menu-ancestor").addClass(e)}),$(".nav-main .nav-arrow").on("click",function(t){t.preventDefault();var n=$(this).parents(),o=n[0];$(o).addClass(e);var a=n[2];$(a).addClass("current-menu-ancestor").removeClass(e)}),$(".nav-toggle-mobile").on("click",function(){!function(){var t=$(".nav-main .nav-menu>.current-menu-item");if(t.length>0){var n=t.parents()[1];$(n).addClass(e)}$("body").toggleClass("mobile-menu-open")}()}),$(".overlay").on("click",function(e){e.preventDefault(),t()}),$("#nav-toggle").on("click",function(){$(this).hasClass("nav-toggle-async")&&!$(this).hasClass("open")?($(this).addClass("is-loading"),$("#styleguide").length>0&&setTimeout(function(){return $("#nav-toggle").trigger("loadend")},2e3)):t(!0)}),$("#nav-toggle").on("loadend",function(){$(this).removeClass("is-loading"),t(!0)})},d=function(){$(".drawer-toggle").click(function(){var e=$(this).parent(".drawer"),t=e.find(".drawer-link"),n=$(this);if(e.hasClass("open"))e.removeClass("open"),t.css({width:n.width()});else{var o="100%";$(window).width()>992&&(o=t.find(".text").outerWidth()),e.addClass("open"),t.css({width:o})}})};var p=function(e){var t;if(void 0===window.sources)return window.cookieconsent.initialise(e,function(e){t=e,document.body.appendChild(t.element)},function(e){console.error(e)}),t;window.location.href.includes("cookie-consent")?(window.cookie_consent_popup||window.cookieconsent.initialise(e,function(e){window.cookie_consent_popup=e,document.body.appendChild(e.element)},function(e){console.error(e)}),window.cookie_consent_popup.open()):window.cookie_consent_popup&&window.cookie_consent_popup.close()},h=function(){if($("#tour-lab").length>0){$("#tour-start").click(function(){return(e=introJs()).setOptions({buttonClass:"btn btn-secondary btn-sm mt-4",tooltipPosition:"auto",positionPrecedence:["bottom","top","right","left"],scrollTo:"tooltip",scrollToElement:!0,steps:[{intro:"This is the laboratory's homepage. <b>It serves to guide the visitors to the different sub-contents</b>. The main contents are projects and publications. Here is the hierarchical order that we are proposing."},{element:"#tour-hero",intro:'Define the <b>laboratory title</b> and a <b>cover image</b> using the <a href="#/organisms/hero" target="_blank">hero</a> component or only <b>a title</b>, if there is no cover, using the following step structure.'},{element:"#tour-intro",intro:"Type a <b>succinct introduction paragraph</b> wrapped inside a <code>.container-grid</code> (the title can also be added here)"},{element:"#tour-projects",intro:'\n              The main objective of a laboratory is to show the projects that are carried out there. In this section, you can use the <a href="#/content-types/research-project" target="_blank">Research project</a> content types to show them. We advise you to put a <b>maximum of 3 projects</b> on the lab’s homepage and then put a link to the page that lists all the projects.\n            '},{element:"#tour-publications",intro:'\n              Laboratories also produce publications. You can list <b>up to 5</b> here with the <a href="#/content-types/publication" target="_blank">Publication</a> component and add a link to the page that lists all the publications.\n            '},{element:"#tour-news",intro:'\n              If you have some news about your laboratory, you can list the latest at this location. We advise you not to list too much (maximum 2) and use the component <a href="#/content-types/news" target="_blank">News</a> content-types (<b>Basic teaser</b>) and add a link to all news page.\n            '},{element:"#tour-partof",intro:'\n            <p>\n              This section is intended to <b>provide the context of the laboratory</b>. It is possible for a laboratory to belong to several institutes and/or faculties. If this is the case, we advise you to use a teaser that brings the visitor to a listing page, rather than putting them all on the lab’s homepage. Laboratories can have themes that categorize them. It is recommended to use component “tag” to list them.\n            </p>\n            <p>\n              For this part, you can use some of the <a href="#/content-types/school" target="_blank">School</a> and <a href="#/content-types/institute" target="_blank">Institute</a> content types. The themes are based on the <a href="#/atoms/tag" target="_blank">tag</a> component.\n            </p>\n            '},{element:"#tour-contact",intro:'\n              <b>Several people may want to contact</b> the laboratory: press, potential collaborators, people interested in your work or simply people who want to know where you are located. That’s why we recommend using the <a href="#/organisms/contact" target="_blank">Contact</a> component (<b>Banner</b>) that gives all this information.\n            '},{element:"#tour-team",intro:'\n              Some visitors may want to ask you questions or <b>see who composes the laboratory\'s team</b>. It is possible to link to the team page using the <a href="#/content-types/basic-page" target="_blank">Teaser basic page</a> component.\n            '},{element:"#tour-sponsors",intro:'\n              It is possible that you have sponsors. On a second column, you can list them thanks to the <a href="#/molecules/sponsor" target="_blank">Sponsor</a> component.\n            '}]}),void e.start();var e})}};(function(){var e=new XMLHttpRequest,t=window.svgPath||"icons/icons.svg";e.open("GET",t,!0),e.send(),e.onload=function(t){var n=document.createElement("div");n.innerHTML=e.responseText,document.body.insertBefore(n,document.body.childNodes[0])}})();var f=function(){var e,t,n,o;$(".upload").find('input[type="file"]').each(function(){var e=$(this),t=e.next().next(".upload-preview");e.on("change",function(){var n=e[0].files,o=n[0].name;n.length>1&&(o="<ul>".concat(Array.from(n).map(function(e){return"<li>".concat(e.name,"</li>")}).join().replace(/,/g,""),"</ul>")),t.html(o)})}),$(".select-multiple").each(function(e,t){$(t).multipleSelect({placeholder:$(t).attr("data-placeholder")||"",width:"100%"})}),$(".tag-input").selectize({plugins:["remove_button"],render:{item:function(e,t){return'<div class="tag tag-primary">'.concat(t(e.text),"</div>")}},create:function(e){return{value:e,text:e}}}),$(".datepicker").pickadate({monthsFull:["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"],monthsShort:["Jan","Fév","Mar","Avr","Mai","Jui","Jui","Aoû","Sep","Oct","Nov","Déc"],weekdaysFull:["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"],weekdaysShort:["Dim","Lun","Mar","Mer","Jeu","Ven","Sam"],labelMonthNext:"Prochain mois",labelMonthPrev:"Mois précédent",labelMonthSelect:"Sélectionnez un mois",labelYearSelect:"Sélectionnez une année",format:"d mmmm yyyy",firstDay:1,today:"",clear:"",close:""}),r(),$(function(){$('[data-toggle="popover"]').popover({placement:"top",html:!0,offset:-135,template:'<div class="popover" role="tooltip"><div class="popover-body"></div></div>'})}),e=$(".gallery"),t=$(".gallery-nav"),e.length>0&&e.each(function(){var e=this;l()(this,function(){var t=$(e).find(".gallery-item");$(e).addClass("ready"),t.each(function(e){$(this).find("figcaption").append('\n            <span class="gallery-counter">'.concat(e+1,"/").concat(t.length,"</span>\n          "))}),new s.a(e,{pageDots:!1,fullscreen:!0,setGallerySize:!0,arrowShape:"M14.2,45.8L53,7.1c1.6-1.6,1.6-4.3,0-5.9s-4.3-1.6-5.9,0L1.2,47c-1.6,1.6-1.6,4.3,0,5.9c0,0,0,0,0,0l45.8,45.8c1.6,1.6,4.3,1.6,5.9,0s1.6-4.3,0-5.9L14.2,54.1h81.6c2.3,0,4.2-1.9,4.2-4.2s-1.9-4.2-4.2-4.2H14.2z"}),$(".flickity-fullscreen-button-view svg path").attr("d","M32,11.9h-2.7V6.5H24V3.8h8V11.9z M24,28.2v-2.7h5.3v-5.4H32v8.2H24z M0,20.1h2.7v5.4H8v2.7H0V20.1z M8,3.8v2.7H2.7v5.4H0V3.8H8z"),$(".flickity-fullscreen-button-exit svg path").attr("d","M18.1,16l13.4,13.4c0.6,0.6,0.6,1.5,0,2.1c-0.6,0.6-1.5,0.6-2.1,0L16,18.1L2.6,31.6c-0.6,0.6-1.5,0.6-2.1,0c-0.6-0.6-0.6-1.5,0-2.1l0,0L13.9,16L0.4,2.6C-0.1,2-0.1,1,0.4,0.4s1.5-0.6,2.1,0L16,13.9L29.4,0.4c0.6-0.6,1.5-0.6,2.1,0c0.6,0.6,0.6,1.5,0,2.1L18.1,16z");var n=$(e).find(".gallery-item.is-selected img").height();$(e).find(".flickity-prev-next-button").css("top","".concat(n/2,"px"))})}),t.length>0&&t.each(function(){var e=this;l()(this,function(){var t=$(e).data("gallery");$(e).addClass("ready"),new s.a(e,{asNavFor:"#".concat(t),cellAlign:"left",pageDots:!1,prevNextButtons:!1,contain:!0})})}),$(".search").on("shown.bs.dropdown",function(){$('.search input[type="text"]').focus()}),$("#search-mobile-toggle").click(function(e){var t=$(".search-mobile"),n=t.find(".form-control");t.toggleClass("show"),$("body").toggleClass("search-open"),t.hasClass("show")&&n.focus()}),$("#search-mobile-close").click(function(e){var t=$(".search-mobile");t.find(".form-control"),t.removeClass("show"),$("body").removeClass("search-open")}),$(".social-share-copy").each(function(){var e=$(this),t=e.text(),n=e.data("success");new ClipboardJS(e[0],{target:function(e){return $(e).parent().prev()[0]}}).on("success",function(e){$(e.trigger).text(n),setTimeout(function(){return $(e.trigger).text(t)},2e3),e.clearSelection()})}),n=(new Date).getTime().toString(16),$(".coursebook-program .tree>li").each(function(e,t){var o=$(".underline a",t),a=$(">ul",t),r="".concat(n,"-").concat(e);a.addClass("collapse collapse-item collapse-item-desktop"),o.addClass("collapse-title collapse-title-desktop collapsed"),a.attr("id",r),o.attr("data-target","#".concat(r)),o.attr("data-toggle","collapse");var i=$("<a></a>");i.addClass("btn btn-block btn-sm btn-primary my-3"),i.html("Voir le plan d'études"),i.attr("href",o.attr("href")),a.append(i)}),Tablesaw.init(),u(),function(){if($(".card-slider").length>0){var e=$(window).width()<768;l()(".card-slider",function(){var t=new s.a(".card-slider",{cellAlign:"left",setGallerySize:!0,pageDots:e,prevNextButtons:!1,contain:!0,groupCells:!1});$(".card-slider-cell").css("height","100%"),$("#card-slider-prev").on("click",function(){t.previous()}),$("#card-slider-next").on("click",function(){t.next()}),t.on("select",function(){$(".card-slider-btn").removeClass("disabled"),0===t.selectedIndex&&$("#card-slider-prev").addClass("disabled"),t.selectedIndex+1!==t.slides.length&&t.selectedIndex+2!==t.slides.length||$("#card-slider-next").addClass("disabled")})})}}(),d(),function(){var e=$("#breadcrumb-wrapper");if($(e).length>0){var t=e[0],n=e.find(".breadcrumb");if($(window).width()>1199&&$(n).length>0&&e.width()<n[0].scrollWidth){var o,a,r=!1;e.on("mousedown",function(n){r=!0,e.addClass("moving"),o=n.pageX-t.offsetLeft,a=t.scrollLeft}),e.on("mouseleave",function(){r=!1,e.removeClass("moving")}),e.on("mouseup",function(){r=!1,e.removeClass("moving")}),e.on("mousemove",function(e){if(r){e.preventDefault();var n=3*(e.pageX-t.offsetLeft-o);t.scrollLeft=a-n}}),e.mousewheel(function(e,n){e.preventDefault(),t.scrollLeft-=40*n}),e.find("*").on("dragstart",function(){return!1})}}}(),p(function(){var e={en:{msg:"By continuing your browsing on this site, you agree to the use of cookies to improve your user experience and to make statistics of visits.",link:"Read the disclaimer",href:"//www.epfl.ch/about/overview/regulations-and-guidelines/disclaimer/"},fr:{msg:"En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies pour am&eacute;liorer votre exp&eacute;rience utilisateur et r&eacute;aliser des statistiques de visites.",link:"Lire les mentions l&eacute;gales",href:"//www.epfl.ch/about/overview/fr/reglements-et-directives/mentions-legales/"}},t=document.documentElement.lang.substring(0,2);e[t]||(t="fr");var n="epfl.ch",o=window.location.hostname;if("localhost"===o||"127.0.0.1"===o)n=o;else{var a=o.split(".").reverse();void 0!==a[0]&&void 0!==a[1]&&(n=a[1]+"."+a[0])}return{theme:"classic",palette:{popup:{background:"rgba(69, 69, 69, 0.96)"},button:{background:"#b51f1f"}},content:{message:e[t].msg,dismiss:"OK",link:e[t].link,href:e[t].href},cookie:{name:"petitpois",domain:n,autoAttach:!1}}}()),o=$("#back-to-top"),$(window).scroll(function(){$(window).scrollTop()>500?o.addClass("show"):o.removeClass("show")}),o.on("click",function(e){e.preventDefault(),$("html, body").animate({scrollTop:0},"300")}),h(),$("a").on("click",function(e){var t=$(e.target).attr("href");t&&t.length>1&&t.match("^#")&&$(e.target)[0].scrollIntoView()}),!!window.MSInputMethodContext&&!!document.documentMode&&(a()(),jQuery("body").addClass("ie"))};void 0===window.sources&&jQuery(document).ready(function(){return f()}),document.addEventListener("ToolboxReady",function(){console.log("backstopjs_ready"),f()})}});