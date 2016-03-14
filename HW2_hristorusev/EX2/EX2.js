function otherCheck() 
{
  /*with visibility*/
  if (document.getElementById('gendero').checked) 
    {
         document.getElementById('otherrow').style.display = 'block';
    }
    else document.getElementById('otherrow').style.display = 'none';
 }