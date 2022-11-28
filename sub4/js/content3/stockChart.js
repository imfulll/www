// JavaScript Document
$(document).ready(function () {
  const data = {
    labels: ["최대주주", "기관", "개인", "외국인", "자사주", "기타법인"],
    datasets: [
      {
        label: "My First Dataset",
        data: [55.17, 16.9, 11.26, 8.16, 5.51, 3.0],
        backgroundColor: [
          "#2F4798",
          "#FA420F",
          "#5FAD02",
          "#0F46FA",
          "#FA5428",
          "#9AFA28",
        ],
        hoverOffset: 5,
        cutout: "60%",
      },
    ],
  };

  const config = {
    type: "doughnut",
    data: data,
    options: {
      plugins: {
        legend: {
          position: "left",
          labels: {
            font: {
              size: 15,
              family: "Noto Sans KR, sans-serif",
            },
          },
          align: "end",
        },
      },
    },
  };

  const myChart = new Chart(document.getElementById("myChart"), config);
});
