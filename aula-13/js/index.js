async function sendImage(id) {
  let url = document.getElementById('mainUrl').value;
  let image = document.getElementById('formImageFile').files[0];
  let formData = new FormData();
  
  formData.append('image', image);
  formData.append('id', id);
  formData.append('action', 'sendImage');
  const opts = {
    method: 'POST',
    body: formData
  }

  await fetch(url + 'actions.php', opts)
    .then(response => response.json())
    .then(data => {
      if(data.status == 'success') {
        document.getElementById('formImageFile').value = '';
        document.getElementById('mainUrl').value = '';
        document.getElementById('formImageFile').focus();
        alert('Imagem enviada com sucesso!');
        window.location.reload();
      } else {
        alert('Erro ao enviar imagem!');
      }
    })     
}

function likeImage(id, id_user) {
  let url = document.getElementById('mainUrl').value;
  let formData = new FormData();
  
  formData.append('id', id);
  formData.append('id_user', id_user);
  formData.append('action', 'likeImage');
  const opts = {
    method: 'POST',
    body: formData
  }

  fetch(url + 'actions.php', opts)
    .then(response => response.json())
    .then(data => {
      if (data.status == 'success') {
        let btnDislike = document.getElementById('btn_dislike-' + id);

        if(data.message == 'like_retirado') {
          let likes = document.getElementById('likes-' + id);
          likes.innerHTML = Number(likes.innerHTML) - 1;
          btnDislike.removeAttribute('disabled');
        } else {
          let likes = document.getElementById('likes-' + id);
          likes.innerHTML = Number(likes.innerHTML) + 1;
          btnDislike.setAttribute('disabled', 'disabled');
        }
      } else {
        alert(data.message);
      }
    })
}

function dislikeImage(id, id_user) {
    let url = document.getElementById('mainUrl').value;
    let formData = new FormData();
    
    formData.append('id', id);
    formData.append('id_user', id_user);
    formData.append('action', 'dislikeImage');
    const opts = {
      method: 'POST',
      body: formData
    }
  
    fetch(url + 'actions.php', opts)
      .then(response => response.json())
      .then(data => {
        if (data.status == 'success') {
          let btnLike = document.getElementById('btn_like-' + id);
          if (data.message == 'dislike_retirado') {
            let dislikes = document.getElementById('dislikes-' + id);
            dislikes.innerHTML = Number(dislikes.innerHTML) - 1;
            btnLike.removeAttribute('disabled');
          } else {
            let dislikes = document.getElementById('dislikes-' + id);
            dislikes.innerHTML = Number(dislikes.innerHTML) + 1;
            btnLike.setAttribute('disabled', 'disabled');
          }
        } else {
          alert(data.message);
        }
      })
  }