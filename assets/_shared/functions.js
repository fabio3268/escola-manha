export async function request (url, options) {
    try {
        const response = await fetch (url, options);
        const data = await response.json();
        return data;
    } catch (err) {
        console.error(err);
        return {
            type: "error",
            message: err.message
        };
    }
}
