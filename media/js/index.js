let explain = [
  {
    dt: "TONY STARK",
    dd: "Genius inventor Tony Stark continued his father Howard Stark’s weaponry business after his parents’ untimely deaths and flew it to even greater heights of innovation. While in Afghanistan to demonstrate a new missile for the U.S. military, Stark’s convoy came under fire by a terrorist group known as the Ten Rings and he was severely wounded. Taken prisoner by the group, Stark awoke in their headquarters to learn that shrapnel near his heart had nearly cost him his...",
  },
  {
    dt: "KIDNAP",
    dd: "Tony Stark is in war-torn Afghanistan with his friend and military liaison, Lieutenant colonel James Rhodes, to demonstrate the new Jericho missile. After the demonstration, the convoy is ambushed and Stark is critically wounded by a missile used by the attackers: one of his company's own. He is captured and imprisoned in a cave by a terrorist group called the Ten Rings. Yinsen, a fellow captive doctor, implants an electromagnet into Stark's chest to keep the shrapnel shards that wounded him from...",
  },
  {
    dt: "IRON MAN",
    dd: "Stark and Yinsen secretly build a small, powerful electric generator called an arc reactor to power Stark's electromagnet and a prototype suit of powered armor to aid in their escape. After the escape from Ten Rings, Tony Stark started to make more iron man suit. By the time of attack of Chitauris, he found out the evil creatures beyond universe, outside of the Earth. Then he made more iron man suits on and on, and became obsessed of the power of protecting Earth...",
  },
  {
    dt: "HERO",
    dd: "Thanos, but is unable to convince 2014-Nebula and kills her. Thanos overpowers Stark, Thor, and a Mjolnir-wielding Rogers and summons his army to retrieve the Stones, intent on using them to destroy the universe and create a new one. A restored Stephen Strange arrives with other sorcerers, the restored Avengers and Guardians of the Galaxy, the Ravagers, and the armies of Wakanda and Asgard to fight Thanos's army. Danvers also arrives and destroys Thanos's...",
  },
];

let str = "";
var ind = 0;

function explainChange() {
  str = "";
  str += `
<dl>
<dt> ${explain[ind].dt} </dt>
<dd> ${explain[ind].dd} </dd>
</dl>
<a href="./sub1.html#section` + (ind+1) + `" class="more aboutMore">MORE</a>

`;

  document.getElementById("explain").innerHTML = str;
}

explainChange();

$("#content .about .thumbnail ul li").click(function (e) {
  e.preventDefault();

  $("#content .about .thumbnail ul li").removeClass("current");
  $(this).addClass("current");
  ind = $(this).index("#content .about .thumbnail ul li"); // 0 1 2 3

  explainChange();
});
