import io from "socket.io-client";
let socket = io.connect("http://192.168.1.13:3030");
export default socket;