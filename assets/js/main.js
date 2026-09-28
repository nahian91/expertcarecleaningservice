    (function(){
      var header = document.getElementById('header');
      if(header){
        addEventListener('scroll', function(){
          header.classList.toggle('scrolled', scrollY > 20);
        });
      }

      var mm = document.getElementById('mobileMenu'),
          burger = document.getElementById('burger'),
          mClose = document.getElementById('mClose');
      if(burger && mm){ burger.onclick = function(){ mm.classList.add('open'); }; }
      if(mClose && mm){ mClose.onclick = function(){ mm.classList.remove('open'); }; }
      if(mm){
        mm.querySelectorAll('a').forEach(function(a){
          a.onclick = function(){ mm.classList.remove('open'); };
        });
      }

      var track = document.getElementById('trustTrack');
      if(track){
        var items = ['Fully Insured','Vetted &amp; Trained','5-Star Rated','Open 24 Hours','Serving London','Done Properly, First Time','Airbnb Turnover Specialists','Our Products or Yours'];
        var spk = '<svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>';
        var one = items.map(function(t){ return '<span class="trust-item">' + spk + t + '</span>'; }).join('');
        track.innerHTML = one + one;
      }

      document.querySelectorAll('.faq-q').forEach(function(q){
        q.onclick = function(){
          var item = q.parentElement,
              a = item.querySelector('.faq-a'),
              open = item.classList.contains('open');
          document.querySelectorAll('.faq-item.open').forEach(function(o){
            o.classList.remove('open');
            o.querySelector('.faq-a').style.maxHeight = null;
          });
          if(!open){
            item.classList.add('open');
            a.style.maxHeight = a.scrollHeight + 'px';
          }
        };
      });

      if('IntersectionObserver' in window){
        var io = new IntersectionObserver(function(es){
          es.forEach(function(e){
            if(e.isIntersecting){
              e.target.classList.add('in');
              io.unobserve(e.target);
            }
          });
        }, { threshold: .12 });
        document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });
      } else {
        document.querySelectorAll('.reveal').forEach(function(el){ el.classList.add('in'); });
      }

      var compileMessage = function() {
        var f = document.getElementById('quoteForm');
        if(!f) return '';
        var getVal = function(name){ return f.elements[name] ? f.elements[name].value : ''; };
        var L = [
          'Hi Expertcare Cleaning Service, I\'d like a cleaning quote.',
          '',
          'Name: ' + getVal('name'),
          'Postcode: ' + getVal('postcode'),
          'Phone: ' + getVal('phone'),
          'Service: ' + getVal('service')
        ];
        [
          ['reason','Reason for clean'],
          ['bedrooms','Bedrooms'],
          ['bathrooms','Bathrooms'],
          ['kitchens','Kitchens'],
          ['living_rooms','Living rooms'],
          ['other_rooms','Other rooms'],
          ['floors','Floors'],
          ['parking','Parking'],
          ['notes','Notes']
        ].forEach(function(p){
          if(getVal(p[0])) L.push(p[1] + ': ' + getVal(p[0]));
        });
        L.push('', '(I can attach photos of the property to this chat.)');
        return encodeURIComponent(L.join('\n'));
      };

      var waBtn = document.getElementById('waCompose');
      if(waBtn){
        waBtn.addEventListener('click', function(){
          var text = compileMessage();
          window.open('https://api.whatsapp.com/send?phone=447919033684&text=' + text, '_blank', 'noopener,noreferrer');
        });
      }

      var formSubmitBtn = document.getElementById('formSubmitBtn');
      if(formSubmitBtn){
        formSubmitBtn.addEventListener('click', function(){
          var text = compileMessage();
          window.open('https://api.whatsapp.com/send?phone=447919033684&text=' + text, '_blank', 'noopener,noreferrer');
        });
      }
    })();