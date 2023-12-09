export const signInUser = async (data, csrf) => {
    const response = await fetch('login', {
        method: 'post',
        headers: {
            "Content-Type": "application/json",
            Accept: "*/*",
            "Accept-Encoding": "gzip, deflate, br",
            Connection: "keep-alive",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrf,
        },
        body: JSON.stringify(data),
    });

    return await response.json();
}

export const signUpUser = async (data, csrf) => {
    const response = await fetch('register', {
        method: 'post',
        headers: {
            "Content-Type": "application/json",
            Accept: "*/*",
            "Accept-Encoding": "gzip, deflate, br",
            Connection: "keep-alive",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrf
        },
        body: JSON.stringify(data),
    });

    return await response.json();
}

export const checkSession = async (csrf) => {
    const response = await fetch('check', {
        method: 'get',
        headers: {
            "Content-Type": "application/json",
            Accept: "*/*",
            "Accept-Encoding": "gzip, deflate, br",
            Connection: "keep-alive",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrf
        },
    });

    return await response.json();
}

export const logOut = async (csrf) => {
    const response = await fetch('logout', {
        method: 'post',
        headers: {
            "Content-Type": "application/json",
            Accept: "*/*",
            "Accept-Encoding": "gzip, deflate, br",
            Connection: "keep-alive",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrf
        },
    });

    return await response.json();
}

export const getUsers = async (csrf) => {
    const response = await fetch('users', {
        method: 'get',
        headers: {
            "Content-Type": "application/json",
            Accept: "*/*",
            "Accept-Encoding": "gzip, deflate, br",
            Connection: "keep-alive",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrf,
        },
    });

    return await response.json();
}

export const deleteUser = async (csrf, id) => {
    const response = await fetch(`users/${id}`, {
        method: 'delete',
        headers: {
            "Content-Type": "application/json",
            Accept: "*/*",
            "Accept-Encoding": "gzip, deflate, br",
            Connection: "keep-alive",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrf,
        },
    });

    return await response.json();
}

export const getCoins = async (csrf) => {
    const response = await fetch('coins', {
        method: 'get',
        headers: {
            "Content-Type": "application/json",
            Accept: "*/*",
            "Accept-Encoding": "gzip, deflate, br",
            Connection: "keep-alive",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrf,
        },
    });

    return await response.json();
}

export const updateCoins = async (csrf, data) => {
    const response = await fetch('/coins', {
        method: 'post',
        headers: {
            "Content-Type": "application/json",
            Accept: "*/*",
            "Accept-Encoding": "gzip, deflate, br",
            Connection: "keep-alive",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrf,
        },
        body: JSON.stringify(data),
    });

    return await response.json();
}
