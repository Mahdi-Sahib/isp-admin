

<script type="text/javascript">
    function fun_view_tl(id) {
        var view_url = $("#hidden_view_tl").val();
        $.ajax({
            url: view_url,
            type: "GET",
            data: {"id": id},
            success: function (result) {
                // console.log(result);
                $("#view_connection_method").text(result.connection_method);
                $("#view_connection_type_id").text(result.connection_type_id);
                $("#view_source_name").text(result.source_name);
                $("#view_repeater_id").text(result.repeater_id);
                $("#view_channel_width").text(result.channel_width);
                $("#view_ssid").text(result.ssid);
                $("#view_authentication_method").text(result.authentication_method);
                $("#view_authentication").text(result.authentication);
                $("#view_slave_ip").text(result.slave_ip);
                $("#view_slave_mac").text(result.slave_mac);
                $("#view_slave_antenna").text(result.slave_antenna);
                $("#view_slave_brand").text(result.slave_brand);
                $("#view_slave_username").text(result.slave_username);
                $("#view_slave_password").text(result.slave_password);
                $("#view_master_ip").text(result.master_ip);
                $("#view_master_mac").text(result.master_mac);
                $("#view_master_antenna").text(result.master_antenna);
                $("#view_master_brand").text(result.master_brand);
                $("#view_master_username").text(result.master_username);
                $("#view_master_password").text(result.master_password);
                $("#view_link_info").text(result.link_info);
                // fiber
                $("#view_fiber_type").text(result.fiber_type);
                $("#view_fiber_distance").text(result.fiber_distance);
                $("#view_fiber_master_port_number").text(result.fiber_master_port_number);
                $("#view_fiber_clint_port_number").text(result.fiber_clint_port_number);

                if ((result.connection_method) === "0") {
                    $("#fiber_show").hide();
                    $("#wirless_show").hide();
                    $("#show_message_lanx").show();
                } else if ((result.connection_method) === "1") {
                    $("#fiber_show").hide();
                    $("#wirless_show").show();
                    $("#show_message_lanx").hide();
                }   else if ((result.connection_method) === "2") {
                    $("#fiber_show").hide();
                    $("#wirless_show").hide();
                    $("#show_message_lanx").show();
                } else if ((result.connection_method) === "3") {
                    $("#fiber_show").show();
                    $("#wirless_show").hide();
                    $("#show_message_lanx").hide();
                }


                $('#view_wireless_type').each(
                    function()
                    {
                        if ((result.wireless_type) === 0) {
                            return $("#view_wireless_type").text('2.4 GHz (802.11b/g/n)');
                        } else if ((result.fiber_core) === 1) {
                            return $("#view_wireless_type").text('3.65 GHz (802.11y)');
                        } else if ((result.fiber_core) === 2) {
                            return $("#view_wireless_type").text("4.9 GHz (802.11j)");
                        } else if ((result.wireless_type) === 3) {
                            return $("#view_wireless_type").text('5 GHz (802.11a/h/j/n/ac)');
                        } else if ((result.wireless_type) === 4) {
                            return $("#view_wireless_type").text('5.9 GHz (802.11p)');
                        } else if ((result.wireless_type) === 5) {
                            return $("#view_wireless_type").text('24 GHz');
                        } else if ((result.wireless_type) === 6) {
                            return $("#view_wireless_type").text('60 GHz (802.11ad)');
                        }
                    }
                );


                $('#view_fiber_core').each(
                    function()
                    {
                    if ((result.fiber_core) === 0) {
                        return $("#view_fiber_core").text('Single Core');
                    } else if ((result.fiber_core) === 1) {
                        return $("#view_fiber_core").text('Dual Core');
                    } else if ((result.fiber_core) === 2) {
                        return $("#view_fiber_core").text("Quad Core");
                    } else if ((result.fiber_core) === 3) {
                        return $("#view_fiber_core").text('Octa Core');
                    }
                }
                );

                $('#view_channel_width').each(
                    function()
                    {
                        if ((result.channel_width) === 0) {
                            return $("#view_channel_width").text('5');
                        } else if ((result.channel_width) === 1) {
                            return $("#view_channel_width").text('10');
                        } else if ((result.channel_width) === 2) {
                            return $("#view_channel_width").text("15");
                        } else if ((result.channel_width) === 3) {
                            return $("#view_channel_width").text('20');
                        }else if ((result.channel_width) === 4) {
                            return $("#view_channel_width").text('25');
                        }else if ((result.channel_width) === 5) {
                            return $("#view_channel_width").text('30');
                        }else if ((result.channel_width) === 6) {
                            return $("#view_channel_width").text('35');
                        }else if ((result.channel_width) === 7) {
                            return $("#view_channel_width").text('40');
                        }else if ((result.channel_width) === 8) {
                            return $("#view_channel_width").text('50');
                        }else if ((result.channel_width) === 9) {
                            return $("#view_channel_width").text('60');
                        }else if ((result.channel_width) === 10) {
                            return $("#view_channel_width").text('80');
                        }else if ((result.channel_width) === 11) {
                            return $("#view_channel_width").text('120');
                        }else if ((result.channel_width) === 12) {
                            return $("#view_channel_width").text('160');
                        }
                    }
                );

                $('#view_fiber_sfp_type').each(
                    function()
                    {
                        if ((result.fiber_sfp_type) === 0) {
                            return $("#view_fiber_sfp_type").text('SC / APC');
                        } else if ((result.fiber_sfp_type) === 1) {
                            return $("#view_fiber_sfp_type").text('FC / PAC');
                        } else if ((result.fiber_sfp_type) === 2) {
                            return $("#view_fiber_sfp_type").text("SC / PC");
                        } else if ((result.fiber_sfp_type) === 3) {
                            return $("#view_fiber_sfp_type").text('FC / PC');
                        }
                    }
                );



            }
        });
    }

    function fun_edit_tl(id) {
        var view_url = $("#hidden_view_tl").val();
        $.ajax({
            url: view_url,
            type: "GET",
            data: {"id": id},
            success: function (result) {
                console.log(result);
                $("#edit_id_tl").val(result.id);
                $("#edit_connection_method").val(result.connection_method);
                // wireless
                $("#edit_connection_type_id").val(result.connection_type_id);
                $("#edit_wireless_type").val(result.wireless_type);
                $("#edit_source_name").val(result.source_name);
                $("#edit_repeater_name").val(result.repeater_name);
                $("#edit_tlcw").val(result.channel_width);
                $("#edit_link_ssid").val(result.ssid);
                $("#edit_authentication_method").val(result.authentication_method);
                $("#edit_authentication").val(result.authentication);
                $("#edit_slave_ip").val(result.slave_ip);
                $("#edit_slave_mac").val(result.slave_mac);
                $("#edit_slave_antenna").val(result.slave_antenna);
                $("#edit_slave_brand").val(result.slave_brand);
                $("#edit_slave_username").val(result.slave_username);
                $("#edit_slave_password").val(result.slave_password);
                $("#edit_master_ip").val(result.master_ip);
                $("#edit_master_mac").val(result.master_mac);
                $("#edit_master_antenna").val(result.master_antenna);
                $("#edit_master_brand").val(result.master_brand);
                $("#edit_master_username").val(result.master_username);
                $("#edit_master_password").val(result.master_password);
                $("#edit_link_info").val(result.link_info);
                // fiber
                $("#edit_fiber_type").val(result.fiber_type);
                $("#edit_fiber_core").val(result.fiber_core);
                $("#edit_fiber_sfp_type").val(result.fiber_sfp_type);
                $("#edit_fiber_distance").val(result.fiber_distance);
                $("#edit_fiber_master_port_number").val(result.fiber_master_port_number);
                $("#edit_fiber_clint_port_number").val(result.fiber_clint_port_number);

                if ((result.connection_method) === "0") {
                    $("#fiber_edit").hide();
                    $("#wirless_edit").hide();
                    $("#show_message_lan").show();
                } else if ((result.connection_method) === "1") {
                    $("#fiber_edit").hide();
                    $("#wirless_edit").show();
                    $("#show_message_lan").hide();
                }   else if ((result.connection_method) === "2") {
                    $("#fiber_edit").hide();
                    $("#wirless_edit").hide();
                    $("#show_message_lan").show();
                } else if ((result.connection_method) === "3") {
                    $("#fiber_edit").show();
                    $("#wirless_edit").hide();
                    $("#show_message_lan").hide();
                }

            }
        });
    }


    function fun_delete_tl(id) {
        var conf = confirm("When you delete Link all ticket's for this Link will deleted.");
        if (conf) {
            var delete_url = $("#hidden_delete_tl").val();
            $.ajax({
                url: delete_url,
                type: "POST",
                data: {"id": id, _token: "{{ csrf_token() }}"},
                success: function (response) {
                    alert(response);
                    location.reload();
                }
            });
        }
        else {
            return false;
        }
    }

</script>
