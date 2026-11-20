<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Web Development Portfolio</title><link rel="stylesheet" href="style.css"></head>
<body><div class="wrap">
<nav><b>&lt;/&gt; BSIT 3S</b><div><a href="#demos">Projects</a></div></nav>
<header class="hero"><h1>Web Development<br>Lab Exercises</h1><p>Welcome to our Website! Here you’ll find our lab exercises on HTTP methods, JSON, XMLHttpRequest, APIs, and XML. Each project has a working demo, so feel free to try them out.</p></header>

<section id="demos"><h2>Projects</h2><p class="sub">Pick an exercise and try it.</p>
<div class="tabs" id="tabs"></div>

<div class="panel" data-t="GET Method"><h3>GET Method</h3><p class="d">Sends the form to form_get.php. Notice the data in the URL.</p>
<form action="form_get.php" method="get">
<label>Name</label><input name="name" value="Edison Avila">
<label>Course</label><input name="course" value="BSIT">
<button class="btn" type="submit">Submit (GET)</button></form>
<a class="src" href="https://github.com/strictlyson/Get_Method" target="_blank" rel="noopener">Source on GitHub →</a></div>

<div class="panel" data-t="POST Method"><h3>POST Method</h3><p class="d">Sends the form to form_post.php. The URL stays clean.</p>
<form action="form_post.php" method="post">
<label>Name</label><input name="name" value="Neil Francis Silla">
<label>Course</label><input name="course" value="BSIT">
<button class="btn" type="submit">Submit (POST)</button></form>
<a class="src" href="https://github.com/strictlyson/Post_Method" target="_blank" rel="noopener">Source on GitHub →</a></div>

<div class="panel" data-t="JSON"><h3>JSON</h3><p class="d">Edit the JSON, then show it as a table or turn it into a single-line string.</p>
<textarea id="jt">[
  {"name":"Edison Avila","course":"BSIT","grade":92},
  {"name":"Neil Francis Silla","course":"BSIT","grade":88},
  {"name":"Lucky Martizano","course":"BSIT","grade":95},
  {"name":"Billy Naire Nobre","course":"BSIT","grade":90},
  {"name":"Daniela Jane Meñosa","course":"BSIT","grade":90}
]</textarea>
<button class="btn" id="jp" type="button">Show data</button><button class="btn alt" id="js" type="button">Convert to Text</button>
<div class="out" id="jo"></div><div class="tbl" id="jtb"></div>
<a class="src" href="https://github.com/strictlyson/FINALS-Lab-Exercises-1-JSON" target="_blank" rel="noopener">Source on GitHub →</a></div>

<div class="panel" data-t="XMLHttpRequest"><h3>XMLHttpRequest</h3><p class="d">A real request to api.php. Watch readyState go from 1 to 4.</p>
<button class="btn" id="xb" type="button">Send request</button>
<div class="out" id="xo">Press the button to start.</div>
<a class="src" href="https://github.com/strictlyson/FINAL-Lab-Exercise-2-Exploring-XMLHttpRequest" target="_blank" rel="noopener">Source on GitHub →</a></div>

<div class="panel" data-t="API"><h3>Exploring an API</h3><p class="d">Fetches users from api.php, then filters them.</p>
<button class="btn" id="ab" type="button">Fetch users</button>
<label>Filter by name</label><input id="af" placeholder="Type to filter">
<div class="out" id="ao">No data yet.</div><div class="tbl" id="atb"></div>
<a class="src" href="https://github.com/strictlyson/Lab_Exercise3-Exploring_API" target="_blank" rel="noopener">Source on GitHub →</a></div>

<div class="panel" data-t="XML"><h3>Exploring XML</h3><p class="d">Loads data.xml from the server and lists its elements.</p>
<button class="btn" id="xp" type="button">Show data</button>
<div class="out" id="xmo"></div><div class="tbl" id="xtb"></div>
<a class="src" href="https://github.com/strictlyson/Lab_Exercise4-Exploring_XML" target="_blank" rel="noopener">Source on GitHub →</a></div>
</section>

</div>
<footer>© <?= date('Y') ?> · <a href="https://github.com/strictlyson" target="_blank" rel="noopener">GitHub</a></footer>

<script>
const $=id=>document.getElementById(id);
const esc=s=>String(s).replace(/[&<>"]/g,c=>({"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;"}[c]));
const table=rows=>{if(!rows.length)return"";const k=Object.keys(rows[0]);return"<table><tr>"+k.map(x=>"<th>"+esc(x)+"</th>").join("")+"</tr>"+rows.map(r=>"<tr>"+k.map(x=>"<td>"+esc(r[x])+"</td>").join("")+"</tr>").join("")+"</table>"};
const panels=[...document.querySelectorAll(".panel")];
panels.forEach((p,i)=>{const b=document.createElement("button");b.textContent=p.dataset.t;b.onclick=()=>show(i);$("tabs").appendChild(b)});
function show(i){panels.forEach((p,j)=>{p.classList.toggle("on",i===j);$("tabs").children[j].classList.toggle("on",i===j)})}
show(location.hash==="#demos"?0:0);
// JSON
$("jp").onclick=()=>{try{const d=JSON.parse($("jt").value);const r=Array.isArray(d)?d:[d];$("jo").textContent="Valid JSON. "+r.length+" record(s).";$("jtb").innerHTML=table(r)}catch(e){$("jo").textContent="Invalid JSON: "+e.message;$("jtb").innerHTML=""}};
$("js").onclick=()=>{try{$("jo").textContent=JSON.stringify(JSON.parse($("jt").value));$("jtb").innerHTML=""}catch(e){$("jo").textContent="Invalid JSON: "+e.message}};
// XMLHttpRequest (real request to api.php)
$("xb").onclick=()=>{const o=$("xo");o.textContent="";const x=new XMLHttpRequest();
x.onreadystatechange=()=>{o.textContent+="readyState "+x.readyState+"\n";if(x.readyState===4){o.textContent+="status: "+x.status+"\nresponseText: "+x.responseText}};
x.open("GET","api.php?action=hello");x.send()};
// API
let data=[];const draw=()=>{const f=$("af").value.toLowerCase();$("atb").innerHTML=table(data.filter(u=>u.name.toLowerCase().includes(f)))};
$("ab").onclick=()=>{$("ao").textContent="Loading…";fetch("api.php?action=users").then(r=>r.json()).then(d=>{data=d;$("ao").textContent="200 OK. "+d.length+" users received.";draw()}).catch(e=>{$("ao").textContent="Request failed: "+e.message})};
$("af").oninput=draw;
// XML
$("xp").onclick=()=>{fetch("data.xml").then(r=>r.text()).then(t=>{const doc=new DOMParser().parseFromString(t,"application/xml");
if(doc.querySelector("parsererror")){$("xmo").textContent="Invalid XML.";return}
const rows=[...doc.documentElement.children].map(n=>{const r={};[...n.attributes].forEach(a=>r[a.name]=a.value);[...n.children].forEach(c=>r[c.tagName]=c.textContent);return r});
$("xmo").textContent="Root: <"+doc.documentElement.tagName+"> with "+rows.length+" child element(s).";$("xtb").innerHTML=table(rows)}).catch(e=>{$("xmo").textContent="Request failed: "+e.message})};
</script>
</body></html>
