$(function () {
  $('#task-result').hide();
  fetchTasks();
  let edit = false;

  $('#search').keyup(() => {
    if ($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: '../php/buscar-tarea.php',
        data: { search },
        type: 'POST',
        success: function (response) {
          if (!response.error) {
            let tasks = JSON.parse(response);
            let template = ``;
            tasks.forEach((task) => {
              template += `<li class="task-item">${task.nombre}</li>`;
            });
            $('#task-result').show();
            $('#container').html(template);
          }
        },
      });
    }
  });

  $('#task-form').submit((e) => {
    e.preventDefault();
    const postData = {
      nombre: $('#nombre').val(),
      apellido: $('#apellido').val(),
      correo: $('#correo').val(),
      domicilio: $('#domicilio').val(),
      id: $('#taskId').val()
    };


    const url = edit === false ? '../php/agregar-tarea.php' : '../php/editar-tarea.php';

    $.ajax({
      url,
      data: postData,
      type: 'POST',
      success: function (response) {
        console.log(response);
        if (!response.error) {
          fetchTasks();
          $('#task-form').trigger('reset');
        }
      },
    });
  });

  function fetchTasks() {
    $.ajax({
      url: '../php/listar-tareas.php',
      type: 'GET',
      success: function (response) {
        const tasks = JSON.parse(response);
        let template = ``;
        tasks.forEach((task) => {
          template += `
                        <tr taskId="${task.id}">
                            <td>${task.id}</td>
                            <td>${task.nombre}</td>
                            <td>${task.apellido}</td>
                             <td>${task.domicilio}</td>
                             <td>${task.correo}</td>
                            <td>
                                <button class="btn btn-danger task-delete">Eliminar</button>
                                <button class="btn btn-warning task-item">Modificar</button>
                            </td>
                        </tr>
                        `;
        });
        $('#tasks').html(template);
        edit = false; // Restablecer 'edit' a false después de cargar las tareas
      },
    });
  }

  $(document).on('click', '.task-delete', () => {
    if (confirm('¿Seguroski que quieres eliminar esa tarea?')) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('taskId');
      $.post('../php/eliminar-tarea.php', { id }, () => {
        fetchTasks();
      });
    }
  });

  $(document).on('click', '.task-item', () => {
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(element).attr('taskId');
    let url = '../php/obtener-una-tarea.php';
    $.ajax({
      url,
      data: { id },
      type: 'POST',
      success: function (response) {
        if (!response.error) {
          const task = JSON.parse(response);
          $('#nombre').val(task.nombre);
          $('#apellido').val(task.apellido);
          $('#domicilio').val(task.domicilio);
          $('#correo').val(task.correo);
          $('#taskId').val(task.id);
          edit = true;
        }
      },
    });
  });
});
