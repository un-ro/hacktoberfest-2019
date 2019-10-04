const uuidv4 = require('uuid/v4');

const createUser = ({name})=>(
	 {
		id: uuidv4(),
		name
	}
)


const createMessage = ({message, sender})=>{
	return {
		id: uuidv4(),
		time: getTime(new Date(Date.now())),
		message: message,
		sender: sender
	}
} 

const createChat = ({messages = [], name="Mikir Gan", users=[]} = {})=>(
	{
		id: uuidv4(),
		name,
		messages,
		users,
		typingUsers: [],

		addMessage: (messages, message)=>{
			return [...messages, message]
		},
		addTypingUser: (typingUsers, username)=>{
			return [...typingUsers, username]
		},
		removeTypingUser: (typingUsers, username) => {
			return typingUsers.filter((u)=>u === username)

		}
	}
)

const getTime = (date)=>{
		return `${date.getHours()}:${("0"+date.getMinutes()).slice(-2)}`
	}

module.exports = {
	createChat,
	createMessage,
	createUser
}