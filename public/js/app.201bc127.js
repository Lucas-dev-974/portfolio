(function(){"use strict";var e={6073:function(e,t,o){o.r(t)},2303:function(e,t,o){var n=o(9242),i=o(3396);function a(e,t,o,n,a,s){const r=(0,i.up)("Navbar"),c=(0,i.up)("Notif"),l=(0,i.up)("router-view");return(0,i.wg)(),(0,i.iD)(i.HY,null,[(0,i.Wm)(r),e.$store.state.notif.on?((0,i.wg)(),(0,i.j4)(c,{key:0})):(0,i.kq)("",!0),(0,i.Wm)(l)],64)}var s=o(870);const r=(0,i._)("link",{rel:"stylesheet",type:"text/css",href:"'https://cdn.jsdelivr.net/npm/vuetify@3.0.1/dist/vuetify.min.css'"},null,-1),c={id:"navbar",class:"px-6"},l=(0,i._)("div",{class:"nav-section uppered letter-space-1"},[(0,i._)("a",{href:"/",class:"logo-text-link"},"Nova")],-1),d={class:"nav-end d-flex"},u=(0,i._)("span",{id:"horloge",class:"px-5"},null,-1),p={key:0};function h(e,t,o,n,a,h){return(0,i.wg)(),(0,i.iD)(i.HY,null,[r,(0,i._)("nav",c,[l,(0,i._)("div",d,[u,e.$store.state.user&&1==e.$store.state.user.role?((0,i.wg)(),(0,i.iD)("div",p,[(0,i.Wm)(s.T,{ligth:"",color:"secondary",elevation:"7",size:"x-small",onClick:h.goToDashboard},{default:(0,i.w5)((()=>[(0,i.Uk)("dasboard")])),_:1},8,["onClick"])])):(0,i.kq)("",!0)])])],64)}var f={mounted(){this.showDate()},methods:{goToDashboard:function(){window.location.href="/dash"},showDate:function(){let e=new Date,t=e.getHours(),o=e.getMinutes();e.getSeconds();t<10&&(t="0"+t),o<10&&(o="0"+o);var n=t+":"+o;document.getElementById("horloge").innerHTML=n,this.refresh()},refresh:function(){setTimeout(this.showDate,1e3)}}},m=o(89);const g=(0,m.Z)(f,[["render",h]]);var v=g,w=o(7139),y=o(7771);const _={style:{width:"fit-content",position:"absolute",right:"10px",top:"80px"}},k={class:"d-flex justify-space-between"},b={class:"bg-dark"};function j(e,t,o,n,a,s){return(0,i.wg)(),(0,i.iD)("div",_,[(0,i.Wm)(y.w,{modelValue:e.alert,"onUpdate:modelValue":t[0]||(t[0]=t=>e.alert=t),color:e.color,closable:"",onClick:e.close},{default:(0,i.w5)((()=>[(0,i._)("div",k,[(0,i._)("div",b,(0,w.zw)(e.message),1)])])),_:1},8,["modelValue","color","onClick"])])}var x={data(){return{message:this.$store.state.notif.message,alert:this.$store.state.notif.on,color:this.$store.state.notif.color}},methods:{close(){this.$store.commit("Notif",{alert:!1})}}};const C=(0,m.Z)(x,[["render",j]]);var D=C,P={components:{Navbar:v,Notif:D},async mounted(){this.$store.dispatch("checkConnexion")}};const T=(0,m.Z)(P,[["render",a]]);var E=T,O=(o(9773),o(8685)),N=(0,O.Rd)(),W=o(2483);const Z={class:"dark"},z=(0,i.uE)('<section class="full-height-nav container"><div id="presentation" class="d-flex flex-wrap"><div class="presentation-item pitem-name"> Lucas Leveneur </div><div class="d-flex flex-wrap pitem-text"><div class=""><div class="titre1"> Bonjour et bienvenue sur Nova mon site web. </div><br><div class="texte1"> Ici vous retrouverez un résumer de mes compétences, quelques projets sur lequelles j’ai pus travaillé (portfolio) mais aussi des articles, des notes de cours sur la programmation. </div></div></div></div><div id="lang-bandroll-container"><div class="shadow-scroll"></div><span class="iconify scroll-item" data-icon="vscode-icons:file-type-js" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="bxl:vuejs" style="color:#41b883;" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="logos:nodejs" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="vscode-icons:file-type-php3" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="logos:laravel" style="color:#41b883;" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="vscode-icons:file-type-python" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="vscode-icons:file-type-django" style="color:#41b883;" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="vscode-icons:file-type-js" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="bxl:vuejs" style="color:#41b883;" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="logos:nodejs" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="vscode-icons:file-type-php3" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="logos:laravel" style="color:#41b883;" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="vscode-icons:file-type-python" data-width="40" data-height="40"></span><span class="iconify scroll-item" data-icon="vscode-icons:file-type-django" style="color:#41b883;" data-width="40" data-height="40"></span><div class="shadow-scroll shscroll-end"></div></div></section>',1);function S(e,t,o,n,a,s){const r=(0,i.up)("Portfolio");return(0,i.wg)(),(0,i.iD)("div",Z,[z,(0,i.Wm)(r)])}var $=o(8291),A=o(6761),H=o(7103),L=o(1539),U=o(8694),q=o(6556);const V=(0,i._)("div",{class:"text-center title-spaced-letter-1",style:{height:"66px"}}," portfolio ",-1),K={key:0,class:"w-100 d-flex justify-center mb-6"},M={class:"d-flex justify-center w-100"},Y={key:0},B={key:1},F={class:"d-flex flex-wrap justify-center"},I={class:"categories-items d-flex ma-2"},G={class:"mx-4"},J={key:1},R={class:"text-center"},Q={key:2,class:"d-flex justify-center my-10"};function X(e,t,o,a,r,c){return(0,i.wg)(),(0,i.iD)("section",{class:(0,w.C_)((e.on_page?"full-height-nav pt-15":"full-height")+" page container")},[V,e.on_page?((0,i.wg)(),(0,i.iD)("div",K,[((0,i.wg)(!0),(0,i.iD)(i.HY,null,(0,i.Ko)(e.categories,(t=>((0,i.wg)(),(0,i.iD)("div",{key:t},[(0,i._)("div",M,[((0,i.wg)(!0),(0,i.iD)(i.HY,null,(0,i.Ko)(t,(t=>((0,i.wg)(),(0,i.iD)("div",{key:t,class:"mx-1"},["langs"==t.type?((0,i.wg)(),(0,i.iD)("div",Y,[(0,i.Wm)(H.v,{color:"secondary",size:"small","data-id":t.id,onClick:e.getbyCategorie},{default:(0,i.w5)((()=>[(0,i.Uk)((0,w.zw)(t.name),1)])),_:2},1032,["data-id","onClick"])])):((0,i.wg)(),(0,i.iD)("div",B,[(0,i.Wm)(H.v,{color:"green",size:"small","data-id":t.id,onClick:e.getbyCategorie},{default:(0,i.w5)((()=>[(0,i.Uk)((0,w.zw)(t.name),1)])),_:2},1032,["data-id","onClick"])]))])))),128))])])))),128))])):(0,i.kq)("",!0),(0,i._)("div",F,[((0,i.wg)(!0),(0,i.iD)(i.HY,null,(0,i.Ko)(e.projects,(t=>((0,i.wg)(),(0,i.iD)("div",{key:t.id,class:"ma-2"},[(0,i.Wm)(A._,{color:"#fff",variant:"tonal",width:"250",height:"250",onClick:(0,n.iM)((o=>e.openCard(t.id)),["stop"])},{default:(0,i.w5)((()=>[(0,i.Wm)(U.f,{src:t.preview_img_path,"max-height":"150","aspect-ratio":3,cover:""},null,8,["src"]),(0,i._)("div",I,[((0,i.wg)(!0),(0,i.iD)(i.HY,null,(0,i.Ko)(t.categories,(e=>((0,i.wg)(),(0,i.iD)("div",{key:e.id},[(0,i.Wm)(H.v,{color:"secondary",varient:"elevated",size:"x-small",class:"mx-1"},{default:(0,i.w5)((()=>[(0,i.Uk)((0,w.zw)(e.name),1)])),_:2},1024)])))),128))]),(0,i._)("div",G,[(0,i._)("h3",null,(0,w.zw)(t.name),1),(0,i._)("p",null,(0,w.zw)(t.description??"Pas de description pour le moment."),1)])])),_:2},1032,["onClick"])])))),128))]),e.on_page?((0,i.wg)(),(0,i.iD)("div",J,[(0,i._)("div",R,[(0,i.Wm)(L.K,{class:"w-50"},{default:(0,i.w5)((()=>[(0,i.Wm)(q.k,{"onUpdate:modelValue":[e.changePage,t[0]||(t[0]=t=>e.page=t)],color:"secondary",theme:"light","active-color":"white",modelValue:e.page,class:"my-4",length:e.total_page},null,8,["onUpdate:modelValue","modelValue","length"])])),_:1})])])):((0,i.wg)(),(0,i.iD)("div",Q,[(0,i.Wm)(s.T,{elevation:"2",variant:"outlined",color:"secondary",to:"/portfolio"},{default:(0,i.w5)((()=>[(0,i.Uk)(" Vois plus ")])),_:1})]))],2)}var ee=o.p+"img/photo-1629757509637-7c99379d6d26.e8a6bfa9.avif",te={data(){return{projects:[],on_page:"/portfolio"==window.location.pathname,page:1,total_page:1,categories:null}},mounted(){this.getProjects(),this.getCategories()},methods:{getProjects:async function(){let e=this.on_page?15:6;const t=await $.Z.get("/api/projects?page="+this.page+"&number_items="+e),o=await t.json();o.data.length>0&&(this.projects=o.data,this.total_page=o.last_page,this.projects.forEach((e=>{e.preview_img_path?e.preview_img_path=this.$store.state.backend_host+"/api/media?path="+e.preview_img_path:e.preview_img_path=ee})),this.$store.commit("setProjects",this.projects))},openCard:function(e){window.location.href="/projet/"+e},changePage:function(e){this.page=e,this.getProjects()},getCategories:async function(){const e=await $.Z.get("/api/categories"),t=await e.json();if(!t)return!1;this.categories=t},getbyCategorie:async function(e){const t=await $.Z.get("/api/projects/by/categ?categorie_id="+e);await t.json()}}};const oe=(0,m.Z)(te,[["render",X]]);var ne=oe,ie={name:"HomeView",components:{Portfolio:ne},data(){return{pages:[]}},mounted(){this.pages=document.querySelectorAll(".page")}};const ae=(0,m.Z)(ie,[["render",S]]);var se=ae,re=o(977),ce=o(9986),le=o(3289);const de={class:"container"},ue={key:0,class:"mx-auto mt-10"},pe={class:"d-flex justify-space-between align-center"},he={class:"title-spaced-letter-1 mt-2"},fe={class:"d-flex",style:{width:"fit-content"}},me={class:"d-flex"},ge={class:"ml-4 text-white italic nunito mt-5"};function ve(e,t,o,n,a,s){return(0,i.wg)(),(0,i.iD)("div",de,[e.imgs.length>0?((0,i.wg)(),(0,i.iD)("div",ue,[(0,i.Wm)(re.k,{height:"300","max-height":"300","hide-delimiters":"","show-arrows":!0,"hide-delimiter-background":""},{default:(0,i.w5)((()=>[((0,i.wg)(!0),(0,i.iD)(i.HY,null,(0,i.Ko)(e.imgs,((e,t)=>((0,i.wg)(),(0,i.j4)(ce.f,{key:t,color:"primary",src:e,cover:""},null,8,["src"])))),128))])),_:1})])):(0,i.kq)("",!0),(0,i._)("div",pe,[(0,i._)("div",he," Projet : "+(0,w.zw)(e.project.name),1),(0,i._)("div",fe,[(0,i.Wm)(le.t,{class:"mx-2",icon:"mdi-github",color:"secondary",onClick:t[0]||(t[0]=t=>e.location.href="/")}),(0,i.Wm)(le.t,{class:"mx-2",icon:"mdi-iframe-outline",color:"secondary",onClick:t[1]||(t[1]=t=>e.location.href="/")})])]),(0,i._)("div",me,[((0,i.wg)(!0),(0,i.iD)(i.HY,null,(0,i.Ko)(e.project.categories,(e=>((0,i.wg)(),(0,i.iD)("div",{key:e},[(0,i.Wm)(H.v,{color:"langs"==e.type?"secondary":"green",class:"mx-1",size:"small"},{default:(0,i.w5)((()=>[(0,i.Uk)((0,w.zw)(e.name),1)])),_:2},1032,["color"])])))),128))]),(0,i._)("div",ge,(0,w.zw)(e.project.description),1)])}o(7658);var we={data(){return{project:{},imgs:[]}},mounted(){this.loadProject()},methods:{loadProject:async function(){const e=window.location.pathname.split("/"),t=e[e.length-1],o=await $.Z.get("/api/project/"+t),n=await o.json();404==o.status&&(this.$store.commit("Notif",{on:!0,color:"red",message:n.message}),window.location.href="/portfolio"),n.preview_img_path?(n.preview_img_path=this.$store.state.backend_host+"/api/media?path="+n.preview_img_path,this.imgs.push(n.preview_img_path)):(n.preview_img_path=ee,this.imgs.push(ee)),this.project=n}}};const ye=(0,m.Z)(we,[["render",ve]]);var _e=ye;const ke=[{path:"/",name:"home",component:se},{path:"/login",name:"login",component:()=>o.e(30).then(o.bind(o,7030))},{path:"/dash",name:"dashboard",component:""},{path:"/portfolio",name:"portfolio",component:ne},{path:"/projet/:projetid",name:"projet",component:_e}],be=(0,W.p7)({history:(0,W.PO)("/"),routes:ke});var je=be,xe=o(4239);o(6073),(0,n.ri)(E).use(xe.Z).use(je).use(N).mount("#app")},8291:function(e,t,o){var n=o(4239);t["Z"]={serveur_host:n.Z.state.backend_host,default_options(e,t){let o=n.Z.state.token??"";const i=JSON.stringify(t);return{method:e,headers:{Accept:"application/json","Content-Type":"application/json",Authorization:`bearer ${o}`},body:i}},async post(e,t){return await window.fetch(this.serveur_host+e,this.default_options("POST",t))},async get(e,t){return await window.fetch(this.serveur_host+e,this.default_options("GET",t))},async delete(e,t){return await fetch(this.serveur_host+e,this.default_options("DELETE",t))}}},4239:function(e,t,o){var n=o(65),i=o(5103),a=o(8291),s=new i.ZP({key:"vuex",storage:window.localStorage});t["Z"]=(0,n.MT)({plugins:[s.plugin],state:{backend_host:"localhost"==window.location.hostname?"http://127.0.0.1:8000":"https://lcs-lvn-portfolio.herokuapp.com/",token:null,user:null,projects:[],notif:{on:!1,color:"",message:""}},getters:{},mutations:{updateToken:function(e,t){e.token=t},setUser:function(e,t){e.user=t},setProjects:function(e,t){e.projects=t},updateProject:function(e,t){e.projects.filter((e=>{e.id==t.id&&console.log("can update")}))},Notif(e,t){t.on?(e.notif.on=!0,e.notif.message=t.message,e.notif.color=t.color):e.notif.on=!1}},actions:{checkConnexion:function({commit:e,state:t}){document.addEventListener("DOMContentLoaded",(async()=>{const e=await a.Z.get("/api/token/check");401==e.status&&(t.user={},t.token="","/login"==window.location.pathname||"/"==window.location.pathname||"/portfolio"==window.location.pathname||window.location.pathname.includes("projet")||(window.location.href="/login"))}))}}})}},t={};function o(n){var i=t[n];if(void 0!==i)return i.exports;var a=t[n]={exports:{}};return e[n](a,a.exports,o),a.exports}o.m=e,function(){var e=[];o.O=function(t,n,i,a){if(!n){var s=1/0;for(d=0;d<e.length;d++){n=e[d][0],i=e[d][1],a=e[d][2];for(var r=!0,c=0;c<n.length;c++)(!1&a||s>=a)&&Object.keys(o.O).every((function(e){return o.O[e](n[c])}))?n.splice(c--,1):(r=!1,a<s&&(s=a));if(r){e.splice(d--,1);var l=i();void 0!==l&&(t=l)}}return t}a=a||0;for(var d=e.length;d>0&&e[d-1][2]>a;d--)e[d]=e[d-1];e[d]=[n,i,a]}}(),function(){o.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return o.d(t,{a:t}),t}}(),function(){o.d=function(e,t){for(var n in t)o.o(t,n)&&!o.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})}}(),function(){o.f={},o.e=function(e){return Promise.all(Object.keys(o.f).reduce((function(t,n){return o.f[n](e,t),t}),[]))}}(),function(){o.u=function(e){return"js/"+e+".202a7ddd.js"}}(),function(){o.miniCssF=function(e){return"css/"+e+".2cd15551.css"}}(),function(){o.g=function(){if("object"===typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"===typeof window)return window}}()}(),function(){o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)}}(),function(){var e={},t="protfolio-front:";o.l=function(n,i,a,s){if(e[n])e[n].push(i);else{var r,c;if(void 0!==a)for(var l=document.getElementsByTagName("script"),d=0;d<l.length;d++){var u=l[d];if(u.getAttribute("src")==n||u.getAttribute("data-webpack")==t+a){r=u;break}}r||(c=!0,r=document.createElement("script"),r.charset="utf-8",r.timeout=120,o.nc&&r.setAttribute("nonce",o.nc),r.setAttribute("data-webpack",t+a),r.src=n),e[n]=[i];var p=function(t,o){r.onerror=r.onload=null,clearTimeout(h);var i=e[n];if(delete e[n],r.parentNode&&r.parentNode.removeChild(r),i&&i.forEach((function(e){return e(o)})),t)return t(o)},h=setTimeout(p.bind(null,void 0,{type:"timeout",target:r}),12e4);r.onerror=p.bind(null,r.onerror),r.onload=p.bind(null,r.onload),c&&document.head.appendChild(r)}}}(),function(){o.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}}(),function(){o.p="/"}(),function(){var e=function(e,t,o,n){var i=document.createElement("link");i.rel="stylesheet",i.type="text/css";var a=function(a){if(i.onerror=i.onload=null,"load"===a.type)o();else{var s=a&&("load"===a.type?"missing":a.type),r=a&&a.target&&a.target.href||t,c=new Error("Loading CSS chunk "+e+" failed.\n("+r+")");c.code="CSS_CHUNK_LOAD_FAILED",c.type=s,c.request=r,i.parentNode.removeChild(i),n(c)}};return i.onerror=i.onload=a,i.href=t,document.head.appendChild(i),i},t=function(e,t){for(var o=document.getElementsByTagName("link"),n=0;n<o.length;n++){var i=o[n],a=i.getAttribute("data-href")||i.getAttribute("href");if("stylesheet"===i.rel&&(a===e||a===t))return i}var s=document.getElementsByTagName("style");for(n=0;n<s.length;n++){i=s[n],a=i.getAttribute("data-href");if(a===e||a===t)return i}},n=function(n){return new Promise((function(i,a){var s=o.miniCssF(n),r=o.p+s;if(t(s,r))return i();e(n,r,i,a)}))},i={143:0};o.f.miniCss=function(e,t){var o={30:1};i[e]?t.push(i[e]):0!==i[e]&&o[e]&&t.push(i[e]=n(e).then((function(){i[e]=0}),(function(t){throw delete i[e],t})))}}(),function(){var e={143:0};o.f.j=function(t,n){var i=o.o(e,t)?e[t]:void 0;if(0!==i)if(i)n.push(i[2]);else{var a=new Promise((function(o,n){i=e[t]=[o,n]}));n.push(i[2]=a);var s=o.p+o.u(t),r=new Error,c=function(n){if(o.o(e,t)&&(i=e[t],0!==i&&(e[t]=void 0),i)){var a=n&&("load"===n.type?"missing":n.type),s=n&&n.target&&n.target.src;r.message="Loading chunk "+t+" failed.\n("+a+": "+s+")",r.name="ChunkLoadError",r.type=a,r.request=s,i[1](r)}};o.l(s,c,"chunk-"+t,t)}},o.O.j=function(t){return 0===e[t]};var t=function(t,n){var i,a,s=n[0],r=n[1],c=n[2],l=0;if(s.some((function(t){return 0!==e[t]}))){for(i in r)o.o(r,i)&&(o.m[i]=r[i]);if(c)var d=c(o)}for(t&&t(n);l<s.length;l++)a=s[l],o.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return o.O(d)},n=self["webpackChunkprotfolio_front"]=self["webpackChunkprotfolio_front"]||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))}();var n=o.O(void 0,[998],(function(){return o(2303)}));n=o.O(n)})();
//# sourceMappingURL=app.201bc127.js.map