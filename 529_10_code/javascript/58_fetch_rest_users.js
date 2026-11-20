const response = await fetch('/api/v1/users', {
  headers: {
    Authorization: `Bearer ${token}`,
    Accept: 'application/json',
  },
});

const data = await response.json();
