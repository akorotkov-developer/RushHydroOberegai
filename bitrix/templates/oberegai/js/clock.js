function clock(idx, sec, min, hr) {
    // получаем контекст canvas
    var ctx = document
    .getElementById("b-weather_clock-"+idx)
    .getContext("2d");
    
    // сохраняем состояние
    ctx.save();
    // инициализируем холст
    ctx.clearRect(0,0,150,150);
    // рисуя в точке 0,0 фактически
    // рисуем в точке 75,75
    ctx.translate(75,75);
    // при рисовании линии в 100px
    // фактически рисуем линию в 40px
    ctx.scale(0.4,0.4);
    // начинаем вращать с 12:00
    ctx.rotate(-Math.PI/2);

    // инициализируем свойства рисунка
    // контуры рисуем черным
    ctx.strokeStyle = "black";
    // заливка тоже черная
    ctx.fillStyle = "black";
    // ширина линии 8px
    ctx.lineWidth = 8;
    // будем рисовать по кругу
    ctx.lineCap = "round";

    // сохраняем состояние
    ctx.save();
    // рисуем внешнюю окружность
    // шириной 14px
    ctx.lineWidth = 10;
    // синим цветом
    ctx.strokeStyle = "#325FA2";
    ctx.fillStyle = "#FFFFFF";
    ctx.beginPath();
    // рисуем окружность, отступающую
    // от центра на 142px
    ctx.arc(0,0,106,0,Math.PI*2,true);
    ctx.fill();
    ctx.stroke();
    ctx.restore();
    
    // начинаем рисовать часовые метки
    // сохраняем предыдущее состояние
    ctx.save();
    ctx.beginPath();
    // для каждого часа
    for(var i = 0; i < 12; i++) {
      // поворачиваем на 1/12
      ctx.rotate(Math.PI/6);
      // перемещаем курсор
      ctx.moveTo(70,0);
      // рисуем черточку 20px
      ctx.lineTo(90,0);
    }
    ctx.stroke();
    ctx.restore();

    // сохраняем состояние
    ctx.save();
    // ставим ширину линии 5px
    ctx.lineWidth = 5;
    ctx.beginPath();
    // рисуем минутные метки
    // для каждой минуты
    for(var i = 0; i < 60; i++) {
      // кроме тех, что совпадут
      // с часами
      if(i%5 != 0) {
        // перемещаем курсор
        ctx.moveTo(87,0);
        // рисуем черточку 3px
        ctx.lineTo(90,0);
      }
      // вращаем холст на 1/60
      ctx.rotate(Math.PI/30);
    }
    ctx.stroke();
    ctx.restore();
    
    // сохраняем состояние
    ctx.save();
    // начинаем рисовать часовую стрелку
    // вращаем холст на текущую позицию
    ctx.rotate((Math.PI/6)*hr + 
               (Math.PI/360)*min + 
               (Math.PI/21600)*sec);
    // устанавливаем ширину линии 14px
    ctx.lineWidth = 12;

    ctx.beginPath();
    // сдвигаем курсор несколько назад
    // стобы было похоже на стрелку
    ctx.moveTo(-17,0);
    // рисуем линию почти до часовых меток
    ctx.lineTo(52,0);
    ctx.stroke();
    ctx.restore();

    // сохраняем состояние
    ctx.save();
    // начинаем рисовать минутную стрелку
    // вращаем холст на текущую позицию
    ctx.rotate((Math.PI/30)*min + 
               (Math.PI/1800)*sec);
    // ширина линии 10px
    ctx.lineWidth = 9;
    ctx.beginPath();
    // двигаем курсор
    ctx.moveTo(-18,0);
    // рисуем линию
    ctx.lineTo(78,0);
    ctx.stroke();
    ctx.restore();
    
    // сохраняем состояние
    ctx.save();
    // начинаем рисовать секундную стрелку
    // вращаем холст на текущую позицию
    ctx.rotate(sec * Math.PI/30);
    // контур и заливка красного цвета
    ctx.strokeStyle = "#D40000";
    ctx.fillStyle = "#D40000";
    // ширина линии 6px
    ctx.lineWidth = 5;
    ctx.beginPath();
    // двигаем курсор
    ctx.moveTo(-20,0);
    // рисуем линию
    ctx.lineTo(58,0);
    ctx.stroke();
    ctx.restore();

    ctx.restore();

    sec++;

    if (sec == 60) {
      sec = 0;
      min++;
    }
    if (min == 60) {
      min = 0;
      min++;
    }

    setTimeout(function() {clock(idx, sec, min, hr);}, 1000);

  }