$(init);
function init()
{
  $('#click').click(function(){
  var url = $('#url').val();
  var URLtest = /^(?:([a-z]+):(?:([a-z]*):)?\/\/)?(?:([^:@]*)(?::([^:@]*))?@)?((?:[a-zа-я0-9_-]+\.)+[a-zа-я]{2,}|localhost|(?:(?:[01]?\d\d?|2[0-4]\d|25[0-5])\.){3}(?:(?:[01]?\d\d?|2[0-4]\d|25[0-5])))(?::(\d+))?(?:([^:\?\#]+))?(?:\?([^\#]+))?(?:\#([^\s]+))?$/i; 
  if (URLtest.test(url))
  {
    $.ajax({
        url: 'send.php',
        data: ({'url': url}),
        type: 'POST',
        success: function(data)
        {   
            if (data[0] == 2) 
              {
                alert('Данная ссылка уже была сокращена. Вот короткий адрес ==>  '+data.substr(1));
              }
            else if (data[0] == 1) alert('Валидация не пройдена');
            else document.getElementById('dataOut').innerHTML += data;
        }
    });
  }
  else alert('Валидация не пройдена');
  });
}