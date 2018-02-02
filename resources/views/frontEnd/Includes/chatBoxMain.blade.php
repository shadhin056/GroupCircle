<div style="display:none;" id="panel" class="chatbox">
    <div id="app" class="chatbox_body">
        <div   onclick="w3_close()" class="chatbox_head">
            <i class="fa fa-window-close-o"></i> Chat Room
            <span class="badge badge-danger">@{{ nuberOfUsers }}</span>
        </div>
        <div class="container">
            <div style="background: white" class="row">
                <ul style="overflow-y: scroll;height: 400px;" class="list-group" v-chat-scroll>

                    <message v-for="value,index in chat.message" :key="value.index"
                    :color=chat.color[index]
                    :user=chat.user[index]
                    :time=chat.time[index]
                    >
                        @{{ value }}
                    </message>
                    <div class="badge badge-pill badge-primary">@{{ typing }}</div>

                </ul>
                <input v-model="message" @keyup.enter="send" style=" position: absolute;bottom: 8px; left: 16px;;width: 335px;border: 2px solid black" type="text" class="form-control" placeholder="type your message">
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function () {
            $("#flip").click(function () {
                $("#panel").slideToggle("slow");
            });
        });
    </script>

</div>

