export default function () {
    return new Promise((resolve) => {
        $.getJSON('/user-data/', function(data) {
            resolve(data)
        }).then((data) => {
            this.name = data.name
            this.avatar = data.avatar
        })
    })
}
