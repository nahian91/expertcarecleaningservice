(function () {
  'use strict';

  // 1. Header scroll tracking
  var header = document.getElementById('header');
  if (header) {
    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 20);
    });
  }

  // 2. Mobile drawer menu
  var mm = document.getElementById('mobileMenu'),
      burger = document.getElementById('burger'),
      mClose = document.getElementById('mClose');

  if (burger && mm) {
    burger.onclick = function () { mm.classList.add('open'); };
  }
  if (mClose && mm) {
    mClose.onclick = function () { mm.classList.remove('open'); };
  }
  if (mm) {
    mm.querySelectorAll('a').forEach(function (a) {
      a.onclick = function () { mm.classList.remove('open'); };
    });
  }

  // 3. Trust track marquee animation
  var track = document.getElementById('trustTrack');
  if (track) {
    var items = [
      'Fully Insured',
      'Vetted &amp; Trained',
      '5-Star Rated',
      'Open 24 Hours',
      'Serving London',
      'Done Properly, First Time',
      'Airbnb Turnover Specialists',
      'Our Products or Yours'
    ];
    var spk = '<svg class="spk" viewBox="0 0 24 24"><path d="M12 1 C12 8 13 9 23 9 C13 9 12 10 12 23 C12 10 11 9 1 9 C11 9 12 8 12 1Z"/></svg>';
    var one = items.map(function (t) { 
      return '<span class="trust-item">' + spk + t + '</span>'; 
    }).join('');
    track.innerHTML = one + one;
  }

  // 4. FAQ Accordion handler
  document.querySelectorAll('.faq-q').forEach(function (q) {
    q.onclick = function () {
      var item = q.parentElement,
          a = item.querySelector('.faq-a'),
          isOpen = item.classList.contains('open');

      document.querySelectorAll('.faq-item.open').forEach(function (o) {
        o.classList.remove('open');
        var ans = o.querySelector('.faq-a');
        if (ans) { ans.style.maxHeight = null; }
      });

      if (!isOpen && a) {
        item.classList.add('open');
        a.style.maxHeight = a.scrollHeight + 'px';
      }
    };
  });

  // 5. Scroll reveal animation
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach(function (el) { 
      io.observe(el); 
    });
  } else {
    document.querySelectorAll('.reveal').forEach(function (el) { 
      el.classList.add('in'); 
    });
  }

  // 6. WhatsApp structured message compiler
  var compileMessage = function () {
    var f = document.getElementById('quoteForm');
    if (!f) return '';
    var getVal = function (name) { 
      return f.elements[name] && f.elements[name].value ? f.elements[name].value : ''; 
    };

    var lines = [
      "Hi Expertcare Cleaning Service, I'd like a cleaning quote.",
      '',
      'Name: ' + getVal('name'),
      'Postcode: ' + getVal('postcode'),
      'Phone: ' + getVal('phone'),
      'Service: ' + getVal('service')
    ];

    [
      ['reason', 'Reason for clean'],
      ['bedrooms', 'Bedrooms'],
      ['bathrooms', 'Bathrooms'],
      ['kitchens', 'Kitchens'],
      ['living_rooms', 'Living rooms'],
      ['other_rooms', 'Other rooms'],
      ['floors', 'Floors'],
      ['parking', 'Parking'],
      ['notes', 'Notes']
    ].forEach(function (p) {
      if (getVal(p[0])) {
        lines.push(p[1] + ': ' + getVal(p[0]));
      }
    });

    lines.push('', '(I can attach photos of the property to this chat.)');
    return encodeURIComponent(lines.join('\n'));
  };

  // 7. Manual WhatsApp redirect trigger
  var waBtn = document.getElementById('waCompose');
  if (waBtn) {
    waBtn.addEventListener('click', function (e) {
      e.preventDefault();
      var waPhone = (typeof ExpertcareData !== 'undefined' && ExpertcareData.whatsapp) 
                    ? ExpertcareData.whatsapp 
                    : '447919033684';
      var text = compileMessage();
      window.open('https://api.whatsapp.com/send?phone=' + waPhone + '&text=' + text, '_blank', 'noopener,noreferrer');
    });
  }

  // 8. Form submit handler (Saves directly to WP database via AJAX)
  var quoteForm = document.getElementById('quoteForm');
  var formSubmitBtn = document.getElementById('formSubmitBtn');
  var noticeBox = document.getElementById('quoteFormNotice');

  if (quoteForm) {
    quoteForm.addEventListener('submit', function (e) {
      e.preventDefault();

      // Check required fields before sending
      if (!quoteForm.checkValidity()) {
        quoteForm.reportValidity();
        return;
      }

      var submitUrl = (typeof ExpertcareData !== 'undefined' && ExpertcareData.ajaxUrl) 
                      ? ExpertcareData.ajaxUrl 
                      : '/wp-admin/admin-ajax.php';

      var formData = new FormData(quoteForm);

      if (formSubmitBtn) {
        formSubmitBtn.disabled = true;
        formSubmitBtn.textContent = 'Submitting Request...';
      }

      fetch(submitUrl, {
        method: 'POST',
        body: formData
      })
      .then(function (res) { return res.json(); })
      .then(function (res) {
        if (noticeBox) {
          noticeBox.style.display = 'block';
          if (res.success) {
            noticeBox.style.background = '#dcfce7';
            noticeBox.style.color = '#15803d';
            noticeBox.style.border = '1px solid #bbf7d0';
            noticeBox.textContent = (res.data && res.data.message) ? res.data.message : 'Estimate request received! We will be in touch shortly.';
            quoteForm.reset();
          } else {
            noticeBox.style.background = '#fef2f2';
            noticeBox.style.color = '#b91c1c';
            noticeBox.style.border = '1px solid #fecaca';
            noticeBox.textContent = res.data || 'Failed to submit estimate. Please check required fields.';
          }
        }
      })
      .catch(function () {
        if (noticeBox) {
          noticeBox.style.display = 'block';
          noticeBox.style.background = '#fef2f2';
          noticeBox.style.color = '#b91c1c';
          noticeBox.textContent = 'Connection error. Please call or message us directly on WhatsApp.';
        }
      })
      .finally(function () {
        if (formSubmitBtn) {
          formSubmitBtn.disabled = false;
          formSubmitBtn.textContent = 'Request My Quote →';
        }
      });
    });
  }

  // Safety trigger if button is type="button"
  if (formSubmitBtn && quoteForm && formSubmitBtn.type === 'button') {
    formSubmitBtn.addEventListener('click', function () {
      if (typeof quoteForm.requestSubmit === 'function') {
        quoteForm.requestSubmit();
      } else {
        quoteForm.dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
      }
    });
  }
})();