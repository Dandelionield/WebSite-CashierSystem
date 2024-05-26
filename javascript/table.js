function reloadTable() {
	$.ajax({
        url: "php/table.php",
        type: "GET",
        dataType: "json",
        success: function(datas){
			$("#table_user").empty();
			$("#table_feedback").empty();
			
			$("#table_user").append(
				`<tr>
					<th>id</th>
					<th>nickname</th>
					<th>email</th>
					<th>password</th>
					<th>admin</th>
				</tr`
			);

			$.each(datas.user, function(i, datas){
				var fila = `<tr onclick="viewUser(${i});">
								<th>${datas.id}</th>
								<th>${datas.nickname}</th>
								<th>${datas.email}</th>
								<th>${datas.password}</th>
								<th>${datas.admin}</th>
							</tr>`;

				$("#table_user").append(fila);
			});
			
			$("#table_feedback").append(
				`<tr>
					<th>id user</th>
					<th>message</th>
					<th>version</th>
					<th>type</th>
				</tr>`
			);

			$.each(datas.feedback, function(i, datas){
				var fila = `<tr onclick="viewFeedback(${i});">
								<th>${datas.id_user}</th>
								<th>${datas.message}</th>
								<th>${datas.version_id}</th>
								<th>${datas.tipo}</th>
							</tr>`;

				$("#table_feedback").append(fila);
			});
        },
        error: function(error){
          alert("error al cargar las tablas");
        }
	});
}

reloadTable();

function viewFeedback(n){
	location.href="view_feedback.html?user=" + n;
}

function viewUser(n){
	location.href="view_user.html?user=" + n;
}